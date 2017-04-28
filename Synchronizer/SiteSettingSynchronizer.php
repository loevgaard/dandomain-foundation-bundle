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
            'name' => $siteSetting->name,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        if ($siteSetting->expectedDeliveryTime) {
            $expectedDeliveryTime = \Dandomain\Api\jsonDateToDate($siteSetting->expectedDeliveryTime);
            $expectedDeliveryTime->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $expectedDeliveryTime = null;
        }

        if ($siteSetting->expectedDeliveryTimeNotInStock) {
            $expectedDeliveryTimeNotInStock = \Dandomain\Api\jsonDateToDate($siteSetting->expectedDeliveryTimeNotInStock);
            $expectedDeliveryTimeNotInStock->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $expectedDeliveryTimeNotInStock = null;
        }

        $entity
            ->setCustomField01($siteSetting->customField01)
            ->setCustomField02($siteSetting->customField02)
            ->setCustomField03($siteSetting->customField03)
            ->setCustomField04($siteSetting->customField04)
            ->setCustomField05($siteSetting->customField05)
            ->setCustomField06($siteSetting->customField06)
            ->setCustomField07($siteSetting->customField07)
            ->setCustomField08($siteSetting->customField08)
            ->setCustomField09($siteSetting->customField09)
            ->setCustomField10($siteSetting->customField10)
            ->setGiftCertificatePdfBackgroundImage($siteSetting->giftCertificatePdfBackgroundImage)
            ->setHidden($siteSetting->hidden)
            ->setHiddenForMobile($siteSetting->hiddenForMobile)
            ->setImageAltText($siteSetting->imageAltText)
            ->setIsToplistHidden($siteSetting->isToplistHidden)
            ->setKeyWords($siteSetting->keyWords)
            ->setLongDescription($siteSetting->longDescription)
            ->setLongDescription2($siteSetting->longDescription2)
            ->setMetaDescription($siteSetting->metaDescription)
            ->setName($siteSetting->name)
            ->setPageTitle($siteSetting->pageTitle)
        ;

        if (null !== $expectedDeliveryTime) {
            $entity->setExpectedDeliveryTime($expectedDeliveryTime);
        }

        if (null !== $expectedDeliveryTimeNotInStock) {
            $entity->setExpectedDeliveryTimeNotInStock($expectedDeliveryTimeNotInStock);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
