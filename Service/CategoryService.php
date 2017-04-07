<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CategorySynchronizer;

class CategoryService
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var CategorySynchronizer
     */
    protected $categorySynchronizer;

    /**
     * Constructor.
     *
     * @param Api                  $api
     * @param EntityManager        $em
     * @param CategorySynchronizer $categorySynchronizer
     */
    public function __construct(Api $api, EntityManager $em, CategorySynchronizer $categorySynchronizer)
    {
        $this->api = $api;
        $this->em = $em;
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
        }
    }
}
