<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTranslationInterface
{
    /**
     * @return string
     */
    public function getCustomField01();

    /**
     * @param string $customField01
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField01($customField01);

    /**
     * @return string
     */
    public function getCustomField02();

    /**
     * @param string $customField02
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField02($customField02);

    /**
     * @return string
     */
    public function getCustomField03();

    /**
     * @param string $customField03
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField03($customField03);

    /**
     * @return string
     */
    public function getCustomField04();

    /**
     * @param string $customField04
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField04($customField04);

    /**
     * @return string
     */
    public function getCustomField05();

    /**
     * @param string $customField05
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField05($customField05);

    /**
     * @return string
     */
    public function getCustomField06();

    /**
     * @param string $customField06
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField06($customField06);

    /**
     * @return string
     */
    public function getCustomField07();

    /**
     * @param string $customField07
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField07($customField07);

    /**
     * @return string
     */
    public function getCustomField08();

    /**
     * @param string $customField08
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField08($customField08);

    /**
     * @return string
     */
    public function getCustomField09();

    /**
     * @param string $customField09
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField09($customField09);

    /**
     * @return string
     */
    public function getCustomField10();

    /**
     * @param string $customField10
     *
     * @return ProductTranslationInterface
     */
    public function setCustomField10($customField10);

    /**
     * @return \DateTime
     */
    public function getExpectedDeliveryTime();

    /**
     * @param \DateTime $expectedDeliveryTime
     *
     * @return ProductTranslationInterface
     */
    public function setExpectedDeliveryTime($expectedDeliveryTime);

    /**
     * @return \DateTime
     */
    public function getExpectedDeliveryTimeNotInStock();

    /**
     * @param \DateTime $expectedDeliveryTimeNotInStock
     *
     * @return ProductTranslationInterface
     */
    public function setExpectedDeliveryTimeNotInStock($expectedDeliveryTimeNotInStock);

    /**
     * @return string
     */
    public function getGiftCertificatePdfBackgroundImage();

    /**
     * @param string $giftCertificatePdfBackgroundImage
     *
     * @return ProductTranslationInterface
     */
    public function setGiftCertificatePdfBackgroundImage($giftCertificatePdfBackgroundImage);

    /**
     * @return bool
     */
    public function getHidden();

    /**
     * @param bool $hidden
     *
     * @return ProductTranslationInterface
     */
    public function setHidden($hidden);

    /**
     * @return bool
     */
    public function getHiddenForMobile();

    /**
     * @param bool $hiddenForMobile
     *
     * @return ProductTranslationInterface
     */
    public function setHiddenForMobile($hiddenForMobile);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getImageAltText();

    /**
     * @param string $imageAltText
     *
     * @return ProductTranslationInterface
     */
    public function setImageAltText($imageAltText);

    /**
     * @return bool
     */
    public function getIsToplistHidden();

    /**
     * @param bool $isToplistHidden
     *
     * @return ProductTranslationInterface
     */
    public function setIsToplistHidden($isToplistHidden);

    /**
     * @return string
     */
    public function getKeyWords();

    /**
     * @param string $keyWords
     *
     * @return ProductTranslationInterface
     */
    public function setKeyWords($keyWords);

    /**
     * @return string
     */
    public function getLongDescription();

    /**
     * @param string $longDescription
     *
     * @return ProductTranslationInterface
     */
    public function setLongDescription($longDescription);

    /**
     * @return string
     */
    public function getLongDescription2();

    /**
     * @param string $longDescription2
     *
     * @return ProductTranslationInterface
     */
    public function setLongDescription2($longDescription2);

    /**
     * @return string
     */
    public function getMetaDescription();

    /**
     * @param string $metaDescription
     *
     * @return ProductTranslationInterface
     */
    public function setMetaDescription($metaDescription);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return ProductTranslationInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getPageTitle();

    /**
     * @param string $pageTitle
     *
     * @return ProductTranslationInterface
     */
    public function setPageTitle($pageTitle);

    /**
     * @return PeriodInterface
     */
    public function getPeriodFrontPage();

    /**
     * @param PeriodInterface $periodFrontPage
     *
     * @return ProductTranslationInterface
     */
    public function setPeriodFrontPage(PeriodInterface $periodFrontPage = null);

    /**
     * @return PeriodInterface
     */
    public function getPeriodHidden();

    /**
     * @param PeriodInterface $periodHidden
     *
     * @return ProductTranslationInterface
     */
    public function setPeriodHidden(PeriodInterface $periodHidden = null);

    /**
     * @return PeriodInterface
     */
    public function getPeriodNew();

    /**
     * @param PeriodInterface $periodNew
     *
     * @return ProductTranslationInterface
     */
    public function setPeriodNew(PeriodInterface $periodNew = null);

    /**
     * @return string
     */
    public function getRememberToBuyTextHeading();

    /**
     * @param string $rememberToBuyTextHeading
     *
     * @return ProductTranslationInterface
     */
    public function setRememberToBuyTextHeading($rememberToBuyTextHeading);

    /**
     * @return string
     */
    public function getRememberToBuyTextSubheading();

    /**
     * @param string $rememberToBuyTextSubheading
     *
     * @return ProductTranslationInterface
     */
    public function setRememberToBuyTextSubheading($rememberToBuyTextSubheading);

    /**
     * @return string
     */
    public function getRetailSalesPrice();

    /**
     * @param string $retailSalesPrice
     *
     * @return ProductTranslationInterface
     */
    public function setRetailSalesPrice($retailSalesPrice);

    /**
     * @return string
     */
    public function getShortDescription();

    /**
     * @param string $shortDescription
     *
     * @return ProductTranslationInterface
     */
    public function setShortDescription($shortDescription);

    /**
     * @return bool
     */
    public function getShowAsNew();

    /**
     * @param bool $showAsNew
     *
     * @return ProductTranslationInterface
     */
    public function setShowAsNew($showAsNew);

    /**
     * @return bool
     */
    public function getShowOnFrontPage();

    /**
     * @param bool $showOnFrontPage
     *
     * @return ProductTranslationInterface
     */
    public function setShowOnFrontPage($showOnFrontPage);

    /**
     * @return int
     */
    public function getSiteId();

    /**
     * @param int $siteId
     *
     * @return ProductTranslationInterface
     */
    public function setSiteId($siteId);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return ProductTranslationInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return string
     */
    public function getTechDocLink();

    /**
     * @param string $techDocLink
     *
     * @return ProductTranslationInterface
     */
    public function setTechDocLink($techDocLink);

    /**
     * @return string
     */
    public function getTechDocLink2();

    /**
     * @param string $techDocLink2
     *
     * @return ProductTranslationInterface
     */
    public function setTechDocLink2($techDocLink2);

    /**
     * @return string
     */
    public function getTechDocLink3();

    /**
     * @param string $techDocLink3
     *
     * @return ProductTranslationInterface
     */
    public function setTechDocLink3($techDocLink3);

    /**
     * @return UnitInterface
     */
    public function getUnit();

    /**
     * @param UnitInterface $unit
     *
     * @return ProductTranslationInterface
     */
    public function setUnit(UnitInterface $unit = null);

    /**
     * @return string
     */
    public function getUnitNumber();

    /**
     * @param string $unitNumber
     *
     * @return ProductTranslationInterface
     */
    public function setUnitNumber($unitNumber);

    /**
     * @return string
     */
    public function getUrlname();

    /**
     * @param string $urlname
     *
     * @return ProductTranslationInterface
     */
    public function setUrlname($urlname);
}
