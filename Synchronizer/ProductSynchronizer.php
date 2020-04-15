<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Repository\ProductRepository;
use Loevgaard\DandomainFoundationBundle\Updater\ProductUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductSynchronizer extends Synchronizer implements ProductSynchronizerInterface
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductUpdater
     */
    protected $productUpdater;

    public function __construct(ProductRepository $repository, Api $api, string $logsDir, ProductUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->productUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): ?ProductInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $product = \GuzzleHttp\json_decode((string) $this->api->productData->getDataProduct($options['number'])->getBody());
        $entity = $this->productUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($product));

        try {
            $this->repository->save($entity);
        } catch (OptimisticLockException $e) {
            return null;
        }

        return $entity;
    }

    /**
     * @param array $options
     * @throws OptimisticLockException
     * @throws UniqueConstraintViolationException
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     */
    public function syncAll(array $options = [])
    {
        // @todo what happens if the sync stops at page 50/125? Could we implement something that resumed the sync?

        $options = $this->resolveOptions($options, [$this, 'configureOptionsAll']);

        $start = $options['start'];
        $end = $options['end'];

        $lastLog = $this->readLog();
        $log = ['options' => $options];

        if ($options['changed']) {
            $productIdsToUpdateParentChildRelationship = [];
            $now = new DateTimeImmutable();

            if (!$start) {
                if (array_key_exists('end', $lastLog) and ($lastLog['end'] instanceof \DateTimeInterface)) {
                    $start = $lastLog['end'];
                } else {
                    $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
                }
            }

            if (!$end) {
                $end = $now;
            }

            // verification of dates
            if ($end > $now) {
                $end = $now;
            }

            if ($start > $end) {
                throw new \InvalidArgumentException('Start date is after end date');
            }

            $this->logger->info($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'));

            $modifiedProductCount = $this->api->productData->countByModifiedInterval($start, $end);
            $pages = ceil($modifiedProductCount / $options['pageSize']);

            $this->logger->info('Modified products: '.$modifiedProductCount.' | Page size: '.$options['pageSize'].' | Page count: '.$pages);

            for ($page = 1; $page <= $pages; ++$page) {
                $this->logger->info($page.' / '.$pages);

                $products = \GuzzleHttp\json_decode((string) $this->api->productData->getDataProductsInModifiedInterval($start, $end, $page, $options['pageSize'])->getBody());

                foreach ($products as $product) {
                    $product = DandomainFoundation\objectToArray($product);
                    $entity = $this->productUpdater->updateFromApiResponse($product);

                    try {
                        $this->repository->save($entity);
                    } catch (UniqueConstraintViolationException $e) {
                        $this->logger->emergency('['.$product['number'].'] '.$e->getMessage());
                        throw $e;
                    }

                    $productIdsToUpdateParentChildRelationship[] = $entity->getId();
                }

                $this->repository->clearAll();
            }

            $log['start'] = $start;
            $log['end'] = $end;
            $this->writeLog($log);

            if(!empty($productIdsToUpdateParentChildRelationship)) {
                $this->repository->updateParentChildRelationships($productIdsToUpdateParentChildRelationship);
            }
        } else {
            $productIdsToNotRemove = [];
            $pageCount = \GuzzleHttp\json_decode($this->api->productData->getProductPageCount($options['pageSize'])->getBody()->getContents());

            // we start from behind since this will sync the newest products first
            for ($page = $pageCount; $page >= 1; --$page) {
                $this->logger->info($page.'/'.$pageCount);

                $products = \GuzzleHttp\json_decode($this->api->productData->getProductPage($page, $options['pageSize'])->getBody()->getContents());

                foreach ($products as $product) {
                    $this->logger->info('Product number: '.$product->number);
                    $entity = $this->productUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($product));
                    $this->repository->save($entity);

                    $productIdsToNotRemove[] = $entity->getId();
                }

                $this->repository->clearAll();
            }

            $this->repository->removeByIds([], $productIdsToNotRemove);

            $this->repository->updateParentChildRelationships();
        }
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
