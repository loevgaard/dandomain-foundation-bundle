<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\PeriodSynchronizer;

class PeriodService
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
     * @var PeriodSynchronizer
     */
    protected $periodSynchronizer;

    /**
     * Constructor.
     *
     * @param Api                $api
     * @param EntityManager      $em
     * @param PeriodSynchronizer $periodSynchronizer
     */
    public function __construct(Api $api, EntityManager $em, PeriodSynchronizer $periodSynchronizer)
    {
        $this->api = $api;
        $this->em = $em;
        $this->periodSynchronizer = $periodSynchronizer;
    }

    /**
     * Synchronizates periods.
     */
    public function periodSync()
    {
        $periods = GuzzleHttp\json_decode($this->api->relatedData->getPeriods()->getBody()->getContents());

        foreach ($periods as $period) {
            $this->periodSynchronizer->syncPeriod($period, true);
        }
    }
}
