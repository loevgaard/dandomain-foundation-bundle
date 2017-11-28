<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundationBundle\Entity\ProductRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\ProductUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Loevgaard\DandomainFoundationBundle\DateTime\DateTimeImmutable;

class ProductSynchronizer extends Synchronizer implements ProductSynchronizerInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $repository;

    /**
     * @var ProductUpdater
     */
    protected $productUpdater;

    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir, ProductUpdater $productUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->productUpdater = $productUpdater;
    }

    public function syncOne(array $options = [])
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $product = \GuzzleHttp\json_decode((string)$this->api->productData->getDataProduct($options['number'])->getBody());
        $entity = $this->productUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($product));
        $this->repository->save($entity);
    }

    public function syncAll(array $options = [])
    {
        // @todo what happens if the sync stops at page 50/125? Could we implement something that resumed the sync?

        $options = $this->resolveOptions($options, [$this, 'configureOptionsAll']);

        $start = $options['start'];
        $end = $options['end'];

        $lastLog = $this->readLog();
        $log = ['options' => $options];

        if ($this->options['changed']) {
            $now = new DateTimeImmutable();

            if (!$start) {
                if (array_key_exists('end', $lastLog) and ($lastLog['end'] instanceof DateTimeImmutable)) {
                    $start = $lastLog['end'];
                } else {
                    $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
                }
            }

            if(!$end) {
                $end = $now;
            }

            // verification of dates
            if($end > $now) {
                $end = $now;
            }

            if($start > $end) {
                throw new \InvalidArgumentException('Start date is after end date');
            }

            $this->logger->info($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'));

            $modifiedProductCount = $this->api->productData->countByModifiedInterval($start, $end);
            $pages = ceil($modifiedProductCount / $options['pageSize']);

            $this->logger->info('Modified products: '.$modifiedProductCount.' | Page size: '.$options['pageSize'].' | Page count: '.$pages);

            for($page = 1; $page <= $pages; $page++) {
                $this->logger->info($page.' / '.$pages);

                $products = \GuzzleHttp\json_decode((string)$this->api->productData->getDataProductsInModifiedInterval($start, $end, $page, $options['pageSize'])->getBody());

                foreach ($products as $product) {
                    //$output->writeln('Product: '.$product->number, OutputInterface::VERBOSITY_VERBOSE);
                    $entity = $this->productUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($product));
                    $this->repository->save($entity);
                }
            }

            $log['start'] = $start;
            $log['end'] = $end;
        } else {
            $pageCount = \GuzzleHttp\json_decode($this->api->productData->getProductPageCount($options['pageSize'])->getBody()->getContents());

            // we start from behind since this will sync the newest products first
            for ($page = $pageCount; $page >= 1; --$page) {
                $this->logger->info($page.'/'.$pageCount);
                $products = \GuzzleHttp\json_decode($this->api->productData->getProductPage($page, $options['pageSize'])->getBody()->getContents());

                foreach ($products as $product) {
                    $entity = $this->productUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($product));
                    $this->repository->save($entity);
                }
            }
        }

        $this->writeLog($log);
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['number'])
            ->setAllowedTypes('number', 'string')
            ->setRequired('number')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'changed' => false,
                'start' => null,
                'end' => null,
                'pageSize' => 100,
            ])
            ->setAllowedTypes('changed', 'bool')
            ->setAllowedTypes('start', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('end', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('pageSize', 'int')
        ;
    }
}
