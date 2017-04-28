<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\SiteSettingInterface;

class SiteSettingSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\SiteSetting';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\SiteSettingInterface';

    /**
     * Synchronizes SiteSetting.
     *
     * @param array $siteSetting
     * @param bool  $flush
     *
     * @return SiteSettingInterface
     */
    public function syncSiteSetting($siteSetting, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $siteSetting->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($siteSetting->id)
            ->setExclStatistics($siteSetting->exclStatistics)
            ->setIsDefault($siteSetting->isDefault)
            ->setName($siteSetting->name)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
