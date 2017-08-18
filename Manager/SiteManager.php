<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\SiteInterface;

class SiteManager extends Manager
{
    /**
     * @return SiteInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param SiteInterface $obj
     */
    public function delete(SiteInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param SiteInterface $obj The entity
     * @param bool $flush
     */
    public function update(SiteInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }

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