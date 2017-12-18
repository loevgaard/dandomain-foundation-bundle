<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
abstract class ProductTranslation implements ProductTranslationInterface
{
    /**
     * @var Period
     */
    protected $periodFrontPage;

    /**
     * @var Period
     */
    protected $periodHidden;

    /**
     * @var Period
     */
    protected $periodNew;

    /**
     * @var Unit
     */
    protected $unit;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField01;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField02;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField03;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField04;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField05;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField06;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField07;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField08;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField09;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField10;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $expectedDeliveryTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $expectedDeliveryTimeNotInStock;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $giftCertificatePdfBackgroundImage;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hidden;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hiddenForMobile;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $imageAltText;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isToplistHidden;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $keyWords;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $pageTitle;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $rememberToBuyTextHeading;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $rememberToBuyTextSubheading;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $retailSalesPrice;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $shortDescription;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showAsNew;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $showOnFrontPage;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $techDocLink;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $techDocLink2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $techDocLink3;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $unitNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $urlname;

    /**
     * {@inheritdoc}
     */
    public function getCustomField01()
    {
        return $this->customField01;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField01($customField01)
    {
        $this->customField01 = $customField01;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField02()
    {
        return $this->customField02;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField02($customField02)
    {
        $this->customField02 = $customField02;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField03()
    {
        return $this->customField03;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField03($customField03)
    {
        $this->customField03 = $customField03;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField04()
    {
        return $this->customField04;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField04($customField04)
    {
        $this->customField04 = $customField04;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField05()
    {
        return $this->customField05;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField05($customField05)
    {
        $this->customField05 = $customField05;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField06()
    {
        return $this->customField06;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField06($customField06)
    {
        $this->customField06 = $customField06;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField07()
    {
        return $this->customField07;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField07($customField07)
    {
        $this->customField07 = $customField07;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField08()
    {
        return $this->customField08;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField08($customField08)
    {
        $this->customField08 = $customField08;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField09()
    {
        return $this->customField09;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField09($customField09)
    {
        $this->customField09 = $customField09;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomField10()
    {
        return $this->customField10;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomField10($customField10)
    {
        $this->customField10 = $customField10;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpectedDeliveryTime()
    {
        return $this->expectedDeliveryTime;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpectedDeliveryTime($expectedDeliveryTime)
    {
        $this->expectedDeliveryTime = $expectedDeliveryTime;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpectedDeliveryTimeNotInStock()
    {
        return $this->expectedDeliveryTimeNotInStock;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpectedDeliveryTimeNotInStock($expectedDeliveryTimeNotInStock)
    {
        $this->expectedDeliveryTimeNotInStock = $expectedDeliveryTimeNotInStock;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftCertificatePdfBackgroundImage()
    {
        return $this->giftCertificatePdfBackgroundImage;
    }

    /**
     * {@inheritdoc}
     */
    public function setGiftCertificatePdfBackgroundImage($giftCertificatePdfBackgroundImage)
    {
        $this->giftCertificatePdfBackgroundImage = $giftCertificatePdfBackgroundImage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * {@inheritdoc}
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHiddenForMobile()
    {
        return $this->hiddenForMobile;
    }

    /**
     * {@inheritdoc}
     */
    public function setHiddenForMobile($hiddenForMobile)
    {
        $this->hiddenForMobile = $hiddenForMobile;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getImageAltText()
    {
        return $this->imageAltText;
    }

    /**
     * {@inheritdoc}
     */
    public function setImageAltText($imageAltText)
    {
        $this->imageAltText = $imageAltText;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsToplistHidden()
    {
        return $this->isToplistHidden;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsToplistHidden($isToplistHidden)
    {
        $this->isToplistHidden = $isToplistHidden;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getKeyWords()
    {
        return $this->keyWords;
    }

    /**
     * {@inheritdoc}
     */
    public function setKeyWords($keyWords)
    {
        $this->keyWords = $keyWords;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLongDescription2()
    {
        return $this->longDescription2;
    }

    /**
     * {@inheritdoc}
     */
    public function setLongDescription2($longDescription2)
    {
        $this->longDescription2 = $longDescription2;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPeriodFrontPage()
    {
        return $this->periodFrontPage;
    }

    /**
     * {@inheritdoc}
     */
    public function setPeriodFrontPage(PeriodInterface $periodFrontPage = null)
    {
        $this->periodFrontPage = $periodFrontPage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPeriodHidden()
    {
        return $this->periodHidden;
    }

    /**
     * {@inheritdoc}
     */
    public function setPeriodHidden(PeriodInterface $periodHidden = null)
    {
        $this->periodHidden = $periodHidden;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPeriodNew()
    {
        return $this->periodNew;
    }

    /**
     * {@inheritdoc}
     */
    public function setPeriodNew(PeriodInterface $periodNew = null)
    {
        $this->periodNew = $periodNew;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRememberToBuyTextHeading()
    {
        return $this->rememberToBuyTextHeading;
    }

    /**
     * {@inheritdoc}
     */
    public function setRememberToBuyTextHeading($rememberToBuyTextHeading)
    {
        $this->rememberToBuyTextHeading = $rememberToBuyTextHeading;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRememberToBuyTextSubheading()
    {
        return $this->rememberToBuyTextSubheading;
    }

    /**
     * {@inheritdoc}
     */
    public function setRememberToBuyTextSubheading($rememberToBuyTextSubheading)
    {
        $this->rememberToBuyTextSubheading = $rememberToBuyTextSubheading;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRetailSalesPrice()
    {
        return $this->retailSalesPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setRetailSalesPrice($retailSalesPrice)
    {
        $this->retailSalesPrice = $retailSalesPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShowAsNew()
    {
        return $this->showAsNew;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowAsNew($showAsNew)
    {
        $this->showAsNew = $showAsNew;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShowOnFrontPage()
    {
        return $this->showOnFrontPage;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowOnFrontPage($showOnFrontPage)
    {
        $this->showOnFrontPage = $showOnFrontPage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * {@inheritdoc}
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * {@inheritdoc}
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTechDocLink()
    {
        return $this->techDocLink;
    }

    /**
     * {@inheritdoc}
     */
    public function setTechDocLink($techDocLink)
    {
        $this->techDocLink = $techDocLink;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTechDocLink2()
    {
        return $this->techDocLink2;
    }

    /**
     * {@inheritdoc}
     */
    public function setTechDocLink2($techDocLink2)
    {
        $this->techDocLink2 = $techDocLink2;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTechDocLink3()
    {
        return $this->techDocLink3;
    }

    /**
     * {@inheritdoc}
     */
    public function setTechDocLink3($techDocLink3)
    {
        $this->techDocLink3 = $techDocLink3;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * {@inheritdoc}
     */
    public function setUnit(UnitInterface $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnitNumber()
    {
        return $this->unitNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setUnitNumber($unitNumber)
    {
        $this->unitNumber = $unitNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlname()
    {
        return $this->urlname;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrlname($urlname)
    {
        $this->urlname = $urlname;

        return $this;
    }
}
