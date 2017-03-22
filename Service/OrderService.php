<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use Loevgaard\DandomainFoundationBundle\Synchronizer\OrderSynchronizer;

class OrderService
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
     * @var OrderSynchronizer
     */
    protected $orderSynchronizer;

    /**
     * Constructor.
     *
     * @param Api           $api
     * @param EntityManager $em
     */
    public function __construct(Api $api, EntityManager $em, OrderSynchronizer $orderSynchronizer)
    {
        $this->api = $api;
        $this->em = $em;
        $this->orderSynchronizer = $orderSynchronizer;
    }

    /**
     * Synchronizates orders.
     */
    public function orderSync()
    {
    }
}
