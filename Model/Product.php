<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
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
     * Constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->manufacturers = new ArrayCollection();
        $this->prices = new ArrayCollection();
        $this->segments = new ArrayCollection();
        $this->variants = new ArrayCollection();
        $this->variantGroups = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getBarCodeNumber()
    {
        return $this->barCodeNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setBarCodeNumber($barCodeNumber)
    {
        $this->barCodeNumber = $barCodeNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addCategory(CategoryInterface $category)
    {
        if (!($this->categories->contains($category))) {
            $this->categories[] = $category;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * {@inheritdoc}
     */
    public function removeCategory(CategoryInterface $category)
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategoryIdList()
    {
        return $this->categoryIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setCategoryIdList($categoryIdList)
    {
        $this->categoryIdList = $categoryIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * {@inheritdoc}
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultCategoryId()
    {
        return $this->defaultCategoryId;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultCategoryId($defaultCategoryId)
    {
        $this->defaultCategoryId = $defaultCategoryId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDisabledVariantIdList()
    {
        return $this->disabledVariantIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setDisabledVariantIdList($disabledVariantIdList)
    {
        $this->disabledVariantIdList = $disabledVariantIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDisabledVariants()
    {
        return $this->disabledVariants;
    }

    /**
     * {@inheritdoc}
     */
    public function setDisabledVariants($disabledVariants)
    {
        $this->disabledVariants = $disabledVariants;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEdbPriserProductNumber()
    {
        return $this->edbPriserProductNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber)
    {
        $this->edbPriserProductNumber = $edbPriserProductNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFileSaleLink()
    {
        return $this->fileSaleLink;
    }

    /**
     * {@inheritdoc}
     */
    public function setFileSaleLink($fileSaleLink)
    {
        $this->fileSaleLink = $fileSaleLink;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGoogleFeedCategory()
    {
        return $this->googleFeedCategory;
    }

    /**
     * {@inheritdoc}
     */
    public function setGoogleFeedCategory($googleFeedCategory)
    {
        $this->googleFeedCategory = $googleFeedCategory;

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
    public function getIsGiftCertificate()
    {
        return $this->isGiftCertificate;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsGiftCertificate($isGiftCertificate)
    {
        $this->isGiftCertificate = $isGiftCertificate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsModified()
    {
        return $this->isModified;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsRateVariants()
    {
        return $this->isRateVariants;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsRateVariants($isRateVariants)
    {
        $this->isRateVariants = $isRateVariants;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsReviewVariants()
    {
        return $this->isReviewVariants;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsReviewVariants($isReviewVariants)
    {
        $this->isReviewVariants = $isReviewVariants;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsVariantMaster()
    {
        return $this->isVariantMaster;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsVariantMaster($isVariantMaster)
    {
        $this->isVariantMaster = $isVariantMaster;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocationNumber()
    {
        return $this->locationNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocationNumber($locationNumber)
    {
        $this->locationNumber = $locationNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addManufacturer(ManufacturerInterface $manufacturer)
    {
        if (!($this->manufacturers->contains($manufacturer))) {
            $this->manufacturers[] = $manufacturer;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * {@inheritdoc}
     */
    public function removeManufacturer(ManufacturerInterface $manufacturer)
    {
        $this->manufacturers->removeElement($manufacturer);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getManufacturereIdList()
    {
        return $this->manufacturereIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setManufacturereIdList($manufacturereIdList)
    {
        $this->manufacturereIdList = $manufacturereIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMaxBuyAmount()
    {
        return $this->maxBuyAmount;
    }

    /**
     * {@inheritdoc}
     */
    public function setMaxBuyAmount($maxBuyAmount)
    {
        $this->maxBuyAmount = $maxBuyAmount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * {@inheritdoc}
     */
    public function setMedias($medias)
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMinBuyAmount()
    {
        return $this->minBuyAmount;
    }

    /**
     * {@inheritdoc}
     */
    public function setMinBuyAmount($minBuyAmount)
    {
        $this->minBuyAmount = $minBuyAmount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMinBuyAmountB2B()
    {
        return $this->minBuyAmountB2B;
    }

    /**
     * {@inheritdoc}
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B)
    {
        $this->minBuyAmountB2B = $minBuyAmountB2B;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * {@inheritdoc}
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addPrice(PriceInterface $price)
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * {@inheritdoc}
     */
    public function removePrice(PriceInterface $price)
    {
        $this->prices->removeElement($price);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductRelations()
    {
        return $this->productRelations;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductRelations($productRelations)
    {
        $this->productRelations = $productRelations;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalesCount()
    {
        return $this->salesCount;
    }

    /**
     * {@inheritdoc}
     */
    public function setSalesCount($salesCount)
    {
        $this->salesCount = $salesCount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addSegment(SegmentInterface $segment)
    {
        $this->segments[] = $segment;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * {@inheritdoc}
     */
    public function removeSegment(SegmentInterface $segment)
    {
        $this->segments->removeElement($segment);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSegmentIdList()
    {
        return $this->segmentIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setSegmentIdList($segmentIdList)
    {
        $this->segmentIdList = $segmentIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSiteSettings()
    {
        return $this->siteSettings;
    }

    /**
     * {@inheritdoc}
     */
    public function setSiteSettings($siteSettings)
    {
        $this->siteSettings = $siteSettings;

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
    public function getStockCount()
    {
        return $this->stockCount;
    }

    /**
     * {@inheritdoc}
     */
    public function setStockCount($stockCount)
    {
        $this->stockCount = $stockCount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * {@inheritdoc}
     */
    public function setStockLimit($stockLimit)
    {
        $this->stockLimit = $stockLimit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * {@inheritdoc}
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addVariant(VariantInterface $variant)
    {
        $this->variants[] = $variant;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * {@inheritdoc}
     */
    public function removeVariant(VariantInterface $variant)
    {
        $this->variants->removeElement($variant);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup)
    {
        $this->variantGroups[] = $variantGroup;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariantGroups()
    {
        return $this->variantGroups;
    }

    /**
     * {@inheritdoc}
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup)
    {
        $this->variantGroups->removeElement($variantGroup);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariantGroupIdList()
    {
        return $this->variantGroupIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setVariantGroupIdList($variantGroupIdList)
    {
        $this->variantGroupIdList = $variantGroupIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariantIdList()
    {
        return $this->variantIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setVariantIdList($variantIdList)
    {
        $this->variantIdList = $variantIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariantMasterId()
    {
        return $this->variantMasterId;
    }

    /**
     * {@inheritdoc}
     */
    public function setVariantMasterId($variantMasterId)
    {
        $this->variantMasterId = $variantMasterId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVendorNumber()
    {
        return $this->vendorNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setVendorNumber($vendorNumber)
    {
        $this->vendorNumber = $vendorNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * {@inheritdoc}
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
}
