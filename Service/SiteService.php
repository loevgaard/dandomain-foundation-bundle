<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizer;

class SiteService
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
     * @var SiteSynchronizer
     */
    protected $siteSynchronizer;

    /**
     * Constructor.
     *
     * @param Api           $api
     * @param EntityManager $em
     * @param SiteSynchronizer $siteSynchronizer
     */
    public function __construct(Api $api, EntityManager $em, SiteSynchronizer $siteSynchronizer)
    {
        $this->api = $api;
        $this->em = $em;
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
