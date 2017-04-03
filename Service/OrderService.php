<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\OrderSynchronizer;
use AppKernel;

class OrderService
{
    /**
     * @var Api
     */
    private $api;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var AppKernel
     */
    private $kernel;

    /**
     * @var OrderSynchronizer
     */
    private $orderSynchronizer;

    /**
     * @var string
     */
    protected $settingsFile;

    /**
     * Constructor.
     *
     * @param Api               $api
     * @param EntityManager     $em
     * @param OrderSynchronizer $orderSynchronizer
     */
    public function __construct(Api $api, EntityManager $em, OrderSynchronizer $orderSynchronizer, AppKernel $kernel)
    {
        $this->api = $api;
        $this->em = $em;
        $this->kernel = $kernel;
        $this->orderSynchronizer = $orderSynchronizer;
        $this->settingsFile = $kernel->getCacheDir().'/dandomain-foundation-order-sync.cache';
    }

    /**
     * Synchronizates orders.
     *
     * @param string               $end
     * @param string     $start
     */
    public function orderSync($end = null, $start = null)
    {
        $settings = unserialize(@file_get_contents($this->settingsFile));

        if (null !== $start) {
            $start = new \DateTime($start);
            $start->setTime(0, 0, 0);
        } elseif (($settings) and array_key_exists('end', $settings)) {
            $start = $settings['end'];
        } else {
        
        }


        if (null !== $end) {
            $end = new \DateTime($end);
        } elseif ($start instanceof \DateTime) {
            $end = clone($start);
            $end = $end->add(new \DateInterval('P7D'));
        }

var_dump($start);
var_dump($end);
        $orders = GuzzleHttp\json_decode($this->api->order->getOrdersInModifiedInterval($start, $end)->getBody()->getContents());
var_dump(count($orders));
        file_put_contents($this->settingsFile, serialize(['end' => $end, 'start' => $start]));
        foreach ($orders as $order) {
            $this->orderSynchronizer->syncOrder($order, true);
            throw new \Exception('aaa');
        }
        file_put_contents($this->settingsFile, serialize(['end' => $end, 'start' => $start]));
    }
}
