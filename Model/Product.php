<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Product implements ProductInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $categories;

    /**
     * @var ArrayCollection
     */
    protected $manufacturers;

    /**
     * @var ArrayCollection
     */
    protected $prices;

    /**
     * @var ArrayCollection
     */
    protected $segments;

    /**
     * @var ArrayCollection
     */
    protected $variantGroups;

    /**
     * @var ArrayCollection
     */
    protected $variants;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $barCodeNumber;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $categoryIdList;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $comments;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $costPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $created;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $createdBy;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $defaultCategoryId;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $disabledVariantIdList;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $disabledVariants;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $edbPriserProductNumber;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $fileSaleLink;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $googleFeedCategory;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isGiftCertificate;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isModified;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isRateVariants;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isReviewVariants;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isVariantMaster;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $locationNumber;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $manufacturereIdList;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $maxBuyAmount;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $medias;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $minBuyAmount;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $minBuyAmountB2B;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $picture;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $productRelations;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $productType;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $salesCount;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $segmentIdList;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $siteSettings;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $stockCount;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $stockLimit;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $typeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $updated;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $updatedBy;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $variantGroupIdList;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $variantIdList;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $variantMasterId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $vendorNumber;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $weight;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;

    /**
     * Get barCodeNumber
     *
     * @return string
     */
    public function getBarCodeNumber()
    {
        return $this->barCodeNumber;
    }

    /**
     * Set barCodeNumber
     *
     * @param string $barCodeNumber
     *
     * @return Product
     */
    public function setBarCodeNumber($barCodeNumber)
    {
        $this->barCodeNumber = $barCodeNumber;

        return $this;
    }

    /**
     * Get categoryIdList
     *
     * @return array
     */
    public function getCategoryIdList()
    {
        return $this->categoryIdList;
    }

    /**
     * Set categoryIdList
     *
     * @param array $categoryIdList
     *
     * @return Product
     */
    public function setCategoryIdList($categoryIdList)
    {
        $this->categoryIdList = $categoryIdList;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Product
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get costPrice
     *
     * @return string
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * Set costPrice
     *
     * @param string $costPrice
     *
     * @return Product
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get defaultCategoryId
     *
     * @return integer
     */
    public function getDefaultCategoryId()
    {
        return $this->defaultCategoryId;
    }

    /**
     * Set defaultCategoryId
     *
     * @param integer $defaultCategoryId
     *
     * @return Product
     */
    public function setDefaultCategoryId($defaultCategoryId)
    {
        $this->defaultCategoryId = $defaultCategoryId;

        return $this;
    }

    /**
     * Get disabledVariantIdList
     *
     * @return array
     */
    public function getDisabledVariantIdList()
    {
        return $this->disabledVariantIdList;
    }

    /**
     * Set disabledVariantIdList
     *
     * @param array $disabledVariantIdList
     *
     * @return Product
     */
    public function setDisabledVariantIdList($disabledVariantIdList)
    {
        $this->disabledVariantIdList = $disabledVariantIdList;

        return $this;
    }

    /**
     * Get disabledVariants
     *
     * @return array
     */
    public function getDisabledVariants()
    {
        return $this->disabledVariants;
    }

    /**
     * Set disabledVariants
     *
     * @param array $disabledVariants
     *
     * @return Product
     */
    public function setDisabledVariants($disabledVariants)
    {
        $this->disabledVariants = $disabledVariants;

        return $this;
    }

    /**
     * Get edbPriserProductNumber
     *
     * @return string
     */
    public function getEdbPriserProductNumber()
    {
        return $this->edbPriserProductNumber;
    }

    /**
     * Set edbPriserProductNumber
     *
     * @param string $edbPriserProductNumber
     *
     * @return Product
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber)
    {
        $this->edbPriserProductNumber = $edbPriserProductNumber;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return Product
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get fileSaleLink
     *
     * @return string
     */
    public function getFileSaleLink()
    {
        return $this->fileSaleLink;
    }

    /**
     * Set fileSaleLink
     *
     * @param string $fileSaleLink
     *
     * @return Product
     */
    public function setFileSaleLink($fileSaleLink)
    {
        $this->fileSaleLink = $fileSaleLink;

        return $this;
    }

    /**
     * Get googleFeedCategory
     *
     * @return string
     */
    public function getGoogleFeedCategory()
    {
        return $this->googleFeedCategory;
    }

    /**
     * Set googleFeedCategory
     *
     * @param string $googleFeedCategory
     *
     * @return Product
     */
    public function setGoogleFeedCategory($googleFeedCategory)
    {
        $this->googleFeedCategory = $googleFeedCategory;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get isGiftCertificate
     *
     * @return boolean
     */
    public function getIsGiftCertificate()
    {
        return $this->isGiftCertificate;
    }

    /**
     * Set isGiftCertificate
     *
     * @param boolean $isGiftCertificate
     *
     * @return Product
     */
    public function setIsGiftCertificate($isGiftCertificate)
    {
        $this->isGiftCertificate = $isGiftCertificate;

        return $this;
    }

    /**
     * Get isModified
     *
     * @return boolean
     */
    public function getIsModified()
    {
        return $this->isModified;
    }

    /**
     * Set isModified
     *
     * @param boolean $isModified
     *
     * @return Product
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;

        return $this;
    }

    /**
     * Get isRateVariants
     *
     * @return boolean
     */
    public function getIsRateVariants()
    {
        return $this->isRateVariants;
    }

    /**
     * Set isRateVariants
     *
     * @param boolean $isRateVariants
     *
     * @return Product
     */
    public function setIsRateVariants($isRateVariants)
    {
        $this->isRateVariants = $isRateVariants;

        return $this;
    }

    /**
     * Get isReviewVariants
     *
     * @return boolean
     */
    public function getIsReviewVariants()
    {
        return $this->isReviewVariants;
    }

    /**
     * Set isReviewVariants
     *
     * @param boolean $isReviewVariants
     *
     * @return Product
     */
    public function setIsReviewVariants($isReviewVariants)
    {
        $this->isReviewVariants = $isReviewVariants;

        return $this;
    }

    /**
     * Get isVariantMaster
     *
     * @return boolean
     */
    public function getIsVariantMaster()
    {
        return $this->isVariantMaster;
    }

    /**
     * Set isVariantMaster
     *
     * @param boolean $isVariantMaster
     *
     * @return Product
     */
    public function setIsVariantMaster($isVariantMaster)
    {
        $this->isVariantMaster = $isVariantMaster;

        return $this;
    }

    /**
     * Get locationNumber
     *
     * @return string
     */
    public function getLocationNumber()
    {
        return $this->locationNumber;
    }

    /**
     * Set locationNumber
     *
     * @param string $locationNumber
     *
     * @return Product
     */
    public function setLocationNumber($locationNumber)
    {
        $this->locationNumber = $locationNumber;

        return $this;
    }

    /**
     * Get manufacturereIdList
     *
     * @return array
     */
    public function getManufacturereIdList()
    {
        return $this->manufacturereIdList;
    }

    /**
     * Set manufacturereIdList
     *
     * @param array $manufacturereIdList
     *
     * @return Product
     */
    public function setManufacturereIdList($manufacturereIdList)
    {
        $this->manufacturereIdList = $manufacturereIdList;

        return $this;
    }

    /**
     * Get maxBuyAmount
     *
     * @return integer
     */
    public function getMaxBuyAmount()
    {
        return $this->maxBuyAmount;
    }

    /**
     * Set maxBuyAmount
     *
     * @param integer $maxBuyAmount
     *
     * @return Product
     */
    public function setMaxBuyAmount($maxBuyAmount)
    {
        $this->maxBuyAmount = $maxBuyAmount;

        return $this;
    }

    /**
     * Get medias
     *
     * @return array
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Set medias
     *
     * @param array $medias
     *
     * @return Product
     */
    public function setMedias($medias)
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * Get minBuyAmount
     *
     * @return integer
     */
    public function getMinBuyAmount()
    {
        return $this->minBuyAmount;
    }

    /**
     * Set minBuyAmount
     *
     * @param integer $minBuyAmount
     *
     * @return Product
     */
    public function setMinBuyAmount($minBuyAmount)
    {
        $this->minBuyAmount = $minBuyAmount;

        return $this;
    }

    /**
     * Get minBuyAmountB2B
     *
     * @return integer
     */
    public function getMinBuyAmountB2B()
    {
        return $this->minBuyAmountB2B;
    }

    /**
     * Set minBuyAmountB2B
     *
     * @param integer $minBuyAmountB2B
     *
     * @return Product
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B)
    {
        $this->minBuyAmountB2B = $minBuyAmountB2B;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Product
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get productRelations
     *
     * @return array
     */
    public function getProductRelations()
    {
        return $this->productRelations;
    }

    /**
     * Set productRelations
     *
     * @param array $productRelations
     *
     * @return Product
     */
    public function setProductRelations($productRelations)
    {
        $this->productRelations = $productRelations;

        return $this;
    }

    /**
     * Get productType
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Set productType
     *
     * @param string $productType
     *
     * @return Product
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * Get salesCount
     *
     * @return integer
     */
    public function getSalesCount()
    {
        return $this->salesCount;
    }

    /**
     * Set salesCount
     *
     * @param integer $salesCount
     *
     * @return Product
     */
    public function setSalesCount($salesCount)
    {
        $this->salesCount = $salesCount;

        return $this;
    }

    /**
     * Get segmentIdList
     *
     * @return array
     */
    public function getSegmentIdList()
    {
        return $this->segmentIdList;
    }

    /**
     * Set segmentIdList
     *
     * @param array $segmentIdList
     *
     * @return Product
     */
    public function setSegmentIdList($segmentIdList)
    {
        $this->segmentIdList = $segmentIdList;

        return $this;
    }

    /**
     * Get siteSettings
     *
     * @return array
     */
    public function getSiteSettings()
    {
        return $this->siteSettings;
    }

    /**
     * Set siteSettings
     *
     * @param array $siteSettings
     *
     * @return Product
     */
    public function setSiteSettings($siteSettings)
    {
        $this->siteSettings = $siteSettings;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return Product
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get stockCount
     *
     * @return integer
     */
    public function getStockCount()
    {
        return $this->stockCount;
    }

    /**
     * Set stockCount
     *
     * @param integer $stockCount
     *
     * @return Product
     */
    public function setStockCount($stockCount)
    {
        $this->stockCount = $stockCount;

        return $this;
    }

    /**
     * Get stockLimit
     *
     * @return integer
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * Set stockLimit
     *
     * @param integer $stockLimit
     *
     * @return Product
     */
    public function setStockLimit($stockLimit)
    {
        $this->stockLimit = $stockLimit;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Product
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Product
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get variantGroupIdList
     *
     * @return array
     */
    public function getVariantGroupIdList()
    {
        return $this->variantGroupIdList;
    }

    /**
     * Set variantGroupIdList
     *
     * @param array $variantGroupIdList
     *
     * @return Product
     */
    public function setVariantGroupIdList($variantGroupIdList)
    {
        $this->variantGroupIdList = $variantGroupIdList;

        return $this;
    }

    /**
     * Get variantIdList
     *
     * @return array
     */
    public function getVariantIdList()
    {
        return $this->variantIdList;
    }

    /**
     * Set variantIdList
     *
     * @param array $variantIdList
     *
     * @return Product
     */
    public function setVariantIdList($variantIdList)
    {
        $this->variantIdList = $variantIdList;

        return $this;
    }

    /**
     * Get variantMasterId
     *
     * @return integer
     */
    public function getVariantMasterId()
    {
        return $this->variantMasterId;
    }

    /**
     * Set variantMasterId
     *
     * @param integer $variantMasterId
     *
     * @return Product
     */
    public function setVariantMasterId($variantMasterId)
    {
        $this->variantMasterId = $variantMasterId;

        return $this;
    }

    /**
     * Get vendorNumber
     *
     * @return string
     */
    public function getVendorNumber()
    {
        return $this->vendorNumber;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set vendorNumber
     *
     * @param string $vendorNumber
     *
     * @return Product
     */
    public function setVendorNumber($vendorNumber)
    {
        $this->vendorNumber = $vendorNumber;

        return $this;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
}
