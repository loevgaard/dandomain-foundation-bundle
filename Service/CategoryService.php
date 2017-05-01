<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CategorySynchronizer;

class CategoryService extends Service
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var CategorySynchronizer
     */
    protected $categorySynchronizer;

    /**
     * Constructor.
     *
     * @param Api                  $api
     * @param CategorySynchronizer $categorySynchronizer
     */
    public function __construct(Api $api, CategorySynchronizer $categorySynchronizer)
    {
        $this->api = $api;
        $this->categorySynchronizer = $categorySynchronizer;
    }

    /**
     * Synchronizates categories.
     */
    public function categorySync()
    {
        $categories = GuzzleHttp\json_decode($this->api->productData->getDataCategories()->getBody()->getContents());

        foreach ($categories as $category) {
            $this->categorySynchronizer->syncCategory($category, true);

            $subCategories = \GuzzleHttp\json_decode($this->api->productData->getDataSubCategories((int) $category->number)->getBody()->getContents());
            foreach ($subCategories as $subCategory) {
                $this->categorySynchronizer->syncCategory($subCategory, true);
            }
        }
    }
}
