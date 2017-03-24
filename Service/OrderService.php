<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use GuzzleHttp;
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
     * @param Api               $api
     * @param EntityManager     $em
     * @param OrderSynchronizer $orderSynchronizer
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
        $from = new \DateTime('20017-01-01');
        $to = new \DateTime();
        $orders = GuzzleHttp\json_decode($this->api->order->getOrders($from, $to)->getBody()->getContents());

        foreach ($orders as $order) {
            $this->orderSynchronizer->syncOrder($order, true);
            throw new \Exception('aaa');
        }
    }
}
