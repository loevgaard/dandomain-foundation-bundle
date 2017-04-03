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
     *
     * @param string $end
     * @param string $start
     */
    public function orderSync($end = null, $start = null)
    {
        if (null !== $end) {
            $end = new \DateTime();
        }
        if (null !== $start) {
            $start = new \DateTime($start);
        }

        if (null === $end) {
        
        }
        //$start->setTime(0, 0, 0);
        //$end->setTime(23, 59, 59);
var_dump($start);
var_dump($end);
/*
        $orders = GuzzleHttp\json_decode($this->api->order->getOrdersInModifiedInterval($start, $end)->getBody()->getContents());
var_dump(count($orders));
        foreach ($orders as $order) {
            $this->orderSynchronizer->syncOrder($order, true);
            throw new \Exception('aaa');
        }
*/
    }
}
