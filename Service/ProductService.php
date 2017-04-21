<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductSynchronizer;
use AppKernel;

class ProductService
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @var AppKernel
     */
    private $kernel;

    /**
     * @var ProductSynchronizer
     */
    private $productSynchronizer;

    /**
     * @var string
     */
    protected $settingsFile;

    /**
     * Constructor.
     *
     * @param Api                 $api
     * @param ProductSynchronizer $productSynchronizer
     * @param AppKernel           $kernel
     */
    public function __construct(Api $api, ProductSynchronizer $productSynchronizer, AppKernel $kernel)
    {
        $this->api = $api;
        $this->kernel = $kernel;
        $this->productSynchronizer = $productSynchronizer;
        $this->settingsFile = $kernel->getCacheDir().'/dandomain-foundation-product-sync.cache';
    }

    /**
     * Synchronizates products.
     *
     * @param bool $changed
     * @param string $end
     * @param string $start
     */
    public function productSync($changed = false, $end = null, $start = null)
    {
        if (true === $changed) {
            $settings = unserialize(@file_get_contents($this->settingsFile));

            if (null !== $start) {
                $start = new \DateTime($start);
                $start->setTime(0, 0, 0);
            } elseif (($settings) and array_key_exists('end', $settings)) {
                $start = $settings['end'];
            } else {
                $start = new \DateTime('2000-01-01');
                $start->setTime(0, 0, 0);
            }

            $startStep = clone $start;

            if (null !== $end) {
                $end = new \DateTime($end);
            }

            if ($startStep instanceof \DateTime) {
                $endStep = clone $startStep;
                $endStep = $endStep->add(new \DateInterval('PT15M'));
            }

            do {
                $now = new \DateTime('NOW');
                if ($startStep > $now) {
                    break;
                }
                if (($end instanceof \DateTime) and ($end < $endStep)) {
                    break;
                }

                $products = GuzzleHttp\json_decode($this->api->productData->getDataProductsInModifiedInterval($startStep, $endStep)->getBody()->getContents());

                foreach ($products as $product) {
                    $this->productSynchronizer->syncProduct($product, true);
throw new \Exception('aa');
                }

                file_put_contents($this->settingsFile, serialize(['end' => $endStep, 'start' => $startStep]));
                $startStep = clone $endStep;
                $endStep = clone $startStep;
                $endStep = $endStep->add(new \DateInterval('PT15M'));
            } while (true);
        } else {
            $pageSize = 200;
            $pageCount = \GuzzleHttp\json_decode($this->api->productData->getProductPageCount($pageSize)->getBody()->getContents());

            for ($page = $pageCount; $page >= 1; --$page) {
                $products = \GuzzleHttp\json_decode($this->api->productData->getProductPage($page, $pageSize)->getBody()->getContents());

                foreach ($products as $product) {
                    $this->productSynchronizer->syncProduct($product, true);
//var_dump($product->variantGroups);
                    if ($product->variantGroups) {
throw new \Exception('bb');
                    }
                }
            }
        }
    }
}
