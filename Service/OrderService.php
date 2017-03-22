<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;

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
     * Constructor.
     *
     * @param Api           $api
     * @param EntityManager $em
     */
    public function __construct(Api $api, EntityManager $em)
    {
        $this->api = $api;
        $this->em = $em;
    }

    /**
     * Synchronizates orders.
     */
    public function orderSync()
    {
    }
}
