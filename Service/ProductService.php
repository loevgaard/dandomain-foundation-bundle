<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\DateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductSynchronizer;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\Kernel;

class ProductService extends Service
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var Kernel
     */
    protected $kernel;

    /**
     * @var ProductSynchronizer
     */
    protected $productSynchronizer;

    /**
     * @var string
     */
    protected $settingsFile;

    /**
     * Constructor.
     *
     * @param Api                 $api
     * @param ProductSynchronizer $productSynchronizer
     * @param Kernel              $kernel
     */
    public function __construct(Api $api, ProductSynchronizer $productSynchronizer, Kernel $kernel)
    {
        $this->api = $api;
        $this->kernel = $kernel;
        $this->productSynchronizer = $productSynchronizer;
        $this->settingsFile = $kernel->getLogDir().'/dandomain-foundation-product-sync.log';
    }

    /**
     * Synchronizates products.
     *
     * @param bool   $changed
     * @param string $end
     * @param string $start
     */
    public function productSync($changed = false, $end = null, $start = null)
    {
        $output = $this->getOutput();

        if (true === $changed) {
            $settings = unserialize(@file_get_contents($this->settingsFile));
            $stepInterval = new \DateInterval('PT15M');

            if (null !== $start) {
                $start = DateTimeImmutable::createFromFormat('Y-m-d', $start)->setTime(0, 0, 0);
            } elseif ($settings and array_key_exists('end', $settings) and ($settings['end'] instanceof \DateTimeImmutable)) {
                $start = $settings['end'];
            } else {
                $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
            }

            /** @var DateTimeImmutable $startStep */
            $startStep = clone $start;

            if (null !== $end) {
                $end = DateTimeImmutable::createFromFormat('Y-m-d', $end);
            }

            /** @var DateTimeImmutable $endStep */
            $endStep = $startStep->add($stepInterval);

            do {
                $now = new DateTimeImmutable();
                if ($startStep > $now) {
                    $output->writeln('Start time is higher than current time, so we stop syncing', OutputInterface::VERBOSITY_VERBOSE);
                    break;
                }
                if($endStep > $now) {
                    $endStep = $now;
                }
                if($startStep > $endStep) {
                    $output->writeln('Start time is higher than end time, so we stop syncing', OutputInterface::VERBOSITY_VERBOSE);
                    break;
                }
                if (($end instanceof \DateTimeInterface) and ($end < $endStep)) {
                    break;
                }

                $output->writeln($startStep->format('Y-m-d H:i:s').' - '.$endStep->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

                $products = GuzzleHttp\json_decode($this->api->productData->getDataProductsInModifiedInterval($startStep, $endStep)->getBody()->getContents());

                foreach ($products as $product) {
                    $output->writeln('Product: '.$product->number, OutputInterface::VERBOSITY_VERBOSE);
                    $this->productSynchronizer->syncProduct($product, true);
                }

                file_put_contents($this->settingsFile, serialize(['end' => $endStep, 'start' => $startStep]));
                $startStep = $endStep->add(new \DateInterval('PT1S'));
                $endStep = $startStep->add($stepInterval);
            } while (true);
        } else {
            $pageSize = 200;
            $pageCount = \GuzzleHttp\json_decode($this->api->productData->getProductPageCount($pageSize)->getBody()->getContents());

            for ($page = $pageCount; $page >= 1; --$page) {
                $products = \GuzzleHttp\json_decode($this->api->productData->getProductPage($page, $pageSize)->getBody()->getContents());

                foreach ($products as $product) {
                    $output->writeln('Product: '.$product->number, OutputInterface::VERBOSITY_VERBOSE);
                    $this->productSynchronizer->syncProduct($product, true);
                }
            }
        }
    }
}
