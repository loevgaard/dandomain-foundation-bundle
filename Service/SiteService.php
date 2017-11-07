<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizer;

class SiteService extends Service
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var SiteSynchronizer
     */
    protected $siteSynchronizer;

    public function syncAll(array $options = [])
    {
        $sites = $this->getSites();

        foreach ($sites as $site) {
            $this->siteSynchronizer->syncSite($site, true);
        }
    }

    public function syncOne(array $options = [])
    {
        $sites = $this->getSites();
        $externalId = $options['externalId'];

        foreach ($sites as $site) {
            if((int)$site->id === (int)$externalId) {
                $this->siteSynchronizer->syncSite($site, true);
                break;
            }
        }
    }

    private function getSites() : array
    {
        return GuzzleHttp\json_decode($this->api->settings->getSites()->getBody()->getContents());
    }

    /**
     * @param SiteSynchronizer $siteSynchronizer
     */
    public function setSiteSynchronizer(SiteSynchronizer $siteSynchronizer)
    {
        $this->siteSynchronizer = $siteSynchronizer;
    }
}
