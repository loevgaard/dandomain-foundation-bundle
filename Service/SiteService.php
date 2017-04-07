<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizer;

class SiteService
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var SiteSynchronizer
     */
    protected $siteSynchronizer;

    /**
     * Constructor.
     *
     * @param Api              $api
     * @param SiteSynchronizer $siteSynchronizer
     */
    public function __construct(Api $api, SiteSynchronizer $siteSynchronizer)
    {
        $this->api = $api;
        $this->siteSynchronizer = $siteSynchronizer;
    }

    /**
     * Synchronizates sites.
     */
    public function siteSync()
    {
        $sites = GuzzleHttp\json_decode($this->api->settings->getSites()->getBody()->getContents());

        foreach ($sites as $site) {
            $this->siteSynchronizer->syncSite($site, true);
        }
    }
}
