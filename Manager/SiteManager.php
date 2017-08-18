<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\SiteInterface;

/**
 * @method SiteInterface create()
 * @method delete(SiteInterface $obj)
 * @method update(SiteInterface $obj, $flush = true)
 */
class SiteManager extends Manager
{
    /**
     * @param $externalId
     * @param bool $fetch If true, we will try to fetch the site from Dandomain
     * @return SiteInterface|null
     */
    public function findByExternalId($externalId, $fetch = true) {
        /** @var SiteInterface $site */
        $site = $this->getRepository()->findOneBy([
            'externalId' => $externalId
        ]);

        if(!$site && $fetch) {
            // @todo fetch sites from Dandomain
        }

        return $site;
    }
}