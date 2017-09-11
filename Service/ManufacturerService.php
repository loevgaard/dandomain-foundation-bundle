<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\ManufacturerSynchronizer;

class ManufacturerService extends Service
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var ManufacturerSynchronizer
     */
    protected $manufacturerSynchronizer;

    /**
     * Constructor.
     *
     * @param Api                      $api
     * @param ManufacturerSynchronizer $manufacturerSynchronizer
     */
    public function __construct(Api $api, ManufacturerSynchronizer $manufacturerSynchronizer)
    {
        $this->api = $api;
        $this->manufacturerSynchronizer = $manufacturerSynchronizer;
    }

    /**
     * @deprecated
     */
    public function manufacturerSync()
    {
        $this->syncAll();
    }

    public function syncAll(array $options = [])
    {
        $manufacturers = GuzzleHttp\json_decode($this->api->relatedData->getManufacturers()->getBody()->getContents());

        foreach ($manufacturers as $manufacturer) {
            $this->manufacturerSynchronizer->syncManufacturer($manufacturer, true);
        }
    }

    public function syncOne(array $options = [])
    {
        $this->syncAll();
    }
}
