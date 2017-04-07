<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\PeriodSynchronizer;

class PeriodService
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var PeriodSynchronizer
     */
    protected $periodSynchronizer;

    /**
     * Constructor.
     *
     * @param Api                $api
     * @param PeriodSynchronizer $periodSynchronizer
     */
    public function __construct(Api $api, PeriodSynchronizer $periodSynchronizer)
    {
        $this->api = $api;
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
