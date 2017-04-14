<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductInterface
{
    /**
     * Get barCodeNumber
     *
     * @return string
     */
    public function getBarCodeNumber();

    /**
     * Set barCodeNumber
     *
     * @param string $barCodeNumber
     *
     * @return ProductInterface
     */
    public function setBarCodeNumber($barCodeNumber);

    /**
     * Add category
     *
     * @param CategoryInterface $category
     *
     * @return ProductInterface
     */
    public function addCategory(CategoryInterface $category);

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories();

    /**
     * Remove category
     *
     * @param CategoryInterface $category
     *
     * @return ProductInterface
     */
    public function removeCategory(CategoryInterface $category);

    /**
     * Get categoryIdList
     *
     * @return array
     */
    public function getCategoryIdList();

    /**
     * Set categoryIdList
     *
     * @param array $categoryIdList
     *
     * @return ProductInterface
     */
    public function setCategoryIdList($categoryIdList);

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments();

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return ProductInterface
     */
    public function setComments($comments);

    /**
     * Get costPrice
     *
     * @return string
     */
    public function getCostPrice();

    /**
     * Set costPrice
     *
     * @param string $costPrice
     *
     * @return ProductInterface
     */
    public function setCostPrice($costPrice);

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ProductInterface
     */
    public function setCreated($created);

    /**
     * Get defaultCategoryId
     *
     * @return integer
     */
    public function getDefaultCategoryId();

    /**
     * Set defaultCategoryId
     *
     * @param integer $defaultCategoryId
     *
     * @return ProductInterface
     */
    public function setDefaultCategoryId($defaultCategoryId);

    /**
     * Get disabledVariantIdList
     *
     * @return array
     */
    public function getDisabledVariantIdList();

    /**
     * Set disabledVariantIdList
     *
     * @param array $disabledVariantIdList
     *
     * @return ProductInterface
     */
    public function setDisabledVariantIdList($disabledVariantIdList);

    /**
     * Get disabledVariants
     *
     * @return array
     */
    public function getDisabledVariants();

    /**
     * Set disabledVariants
     *
     * @param array $disabledVariants
     *
     * @return ProductInterface
     */
    public function setDisabledVariants($disabledVariants);

    /**
     * Get edbPriserProductNumber
     *
     * @return string
     */
    public function getEdbPriserProductNumber();

    /**
     * Set edbPriserProductNumber
     *
     * @param string $edbPriserProductNumber
     *
     * @return ProductInterface
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber);

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return ProductInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fileSaleLink
     *
     * @return string
     */
    public function getFileSaleLink();

    /**
     * Set fileSaleLink
     *
     * @param string $fileSaleLink
     *
     * @return ProductInterface
     */
    public function setFileSaleLink($fileSaleLink);

    /**
     * Get googleFeedCategory
     *
     * @return string
     */
    public function getGoogleFeedCategory();

    /**
     * Set googleFeedCategory
     *
     * @param string $googleFeedCategory
     *
     * @return ProductInterface
     */
    public function setGoogleFeedCategory($googleFeedCategory);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get isGiftCertificate
     *
     * @return boolean
     */
    public function getIsGiftCertificate();

    /**
     * Set isGiftCertificate
     *
     * @param boolean $isGiftCertificate
     *
     * @return ProductInterface
     */
    public function setIsGiftCertificate($isGiftCertificate);

    /**
     * Get isModified
     *
     * @return boolean
     */
    public function getIsModified();

    /**
     * Set isModified
     *
     * @param boolean $isModified
     *
     * @return ProductInterface
     */
    public function setIsModified($isModified);

    /**
     * Get isRateVariants
     *
     * @return boolean
     */
    public function getIsRateVariants();

    /**
     * Set isRateVariants
     *
     * @param boolean $isRateVariants
     *
     * @return ProductInterface
     */
    public function setIsRateVariants($isRateVariants);

    /**
     * Get isReviewVariants
     *
     * @return boolean
     */
    public function getIsReviewVariants();

    /**
     * Set isReviewVariants
     *
     * @param boolean $isReviewVariants
     *
     * @return ProductInterface
     */
    public function setIsReviewVariants($isReviewVariants);

    /**
     * Get isVariantMaster
     *
     * @return boolean
     */
    public function getIsVariantMaster();

    /**
     * Set isVariantMaster
     *
     * @param boolean $isVariantMaster
     *
     * @return ProductInterface
     */
    public function setIsVariantMaster($isVariantMaster);

    /**
     * Get locationNumber
     *
     * @return string
     */
    public function getLocationNumber();

    /**
     * Set locationNumber
     *
     * @param string $locationNumber
     *
     * @return ProductInterface
     */
    public function setLocationNumber($locationNumber);

    /**
     * Add manufacturer
     *
     * @param ManufacturerInterface $manufacturer
     *
     * @return ProductInterface
     */
    public function addManufacturer(ManufacturerInterface $manufacturer);

    /**
     * Get manufacturers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManufacturers();

    /**
     * Remove manufacturer
     *
     * @param ManufacturerInterface $manufacturer
     *
     * @return ProductInterface
     */
    public function removeManufacturer(ManufacturerInterface $manufacturer);

    /**
     * Get manufacturereIdList
     *
     * @return array
     */
    public function getManufacturereIdList();

    /**
     * Set manufacturereIdList
     *
     * @param array $manufacturereIdList
     *
     * @return ProductInterface
     */
    public function setManufacturereIdList($manufacturereIdList);

    /**
     * Get maxBuyAmount
     *
     * @return integer
     */
    public function getMaxBuyAmount();

    /**
     * Set maxBuyAmount
     *
     * @param integer $maxBuyAmount
     *
     * @return ProductInterface
     */
    public function setMaxBuyAmount($maxBuyAmount);

    /**
     * Get medias
     *
     * @return array
     */
    public function getMedias();

    /**
     * Set medias
     *
     * @param array $medias
     *
     * @return ProductInterface
     */
    public function setMedias($medias);

    /**
     * Get minBuyAmount
     *
     * @return integer
     */
    public function getMinBuyAmount();

    /**
     * Set minBuyAmount
     *
     * @param integer $minBuyAmount
     *
     * @return ProductInterface
     */
    public function setMinBuyAmount($minBuyAmount);

    /**
     * Get minBuyAmountB2B
     *
     * @return integer
     */
    public function getMinBuyAmountB2B();

    /**
     * Set minBuyAmountB2B
     *
     * @param integer $minBuyAmountB2B
     *
     * @return ProductInterface
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B);

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber();

    /**
     * Set number
     *
     * @param string $number
     *
     * @return ProductInterface
     */
    public function setNumber($number);

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture();

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return ProductInterface
     */
    public function setPicture($picture);

    /**
     * Add price
     *
     * @param PriceInterface $price
     *
     * @return ProductInterface
     */
    public function addPrice(PriceInterface $price);

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrices();

    /**
     * Remove price
     *
     * @param PriceInterface $price
     *
     * @return ProductInterface
     */
    public function removePrice(PriceInterface $price);

    /**
     * Get productRelations
     *
     * @return array
     */
    public function getProductRelations();

    /**
     * Set productRelations
     *
     * @param array $productRelations
     *
     * @return ProductInterface
     */
    public function setProductRelations($productRelations);

    /**
     * Get productType
     *
     * @return string
     */
    public function getProductType();

    /**
     * Set productType
     *
     * @param string $productType
     *
     * @return ProductInterface
     */
    public function setProductType($productType);

    /**
     * Get salesCount
     *
     * @return integer
     */
    public function getSalesCount();

    /**
     * Set salesCount
     *
     * @param integer $salesCount
     *
     * @return ProductInterface
     */
    public function setSalesCount($salesCount);

    /**
     * Get segmentIdList
     *
     * @return array
     */
    public function getSegmentIdList();

    /**
     * Set segmentIdList
     *
     * @param array $segmentIdList
     *
     * @return ProductInterface
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * Get siteSettings
     *
     * @return array
     */
    public function getSiteSettings();

    /**
     * Set siteSettings
     *
     * @param array $siteSettings
     *
     * @return ProductInterface
     */
    public function setSiteSettings($siteSettings);

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return ProductInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get stockCount
     *
     * @return integer
     */
    public function getStockCount();

    /**
     * Set stockCount
     *
     * @param integer $stockCount
     *
     * @return ProductInterface
     */
    public function setStockCount($stockCount);

    /**
     * Get stockLimit
     *
     * @return integer
     */
    public function getStockLimit();

    /**
     * Set stockLimit
     *
     * @param integer $stockLimit
     *
     * @return ProductInterface
     */
    public function setStockLimit($stockLimit);

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId();

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return ProductInterface
     */
    public function setTypeId($typeId);

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return ProductInterface
     */
    public function setUpdated($updated);

    /**
     * Add variant
     *
     * @param VariantInterface $variant
     *
     * @return ProductInterface
     */
    public function addVariant(VariantInterface $variant);

    /**
     * Get variants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariants();

    /**
     * Remove variant
     *
     * @param VariantInterface $variant
     *
     * @return ProductInterface
     */
    public function removeVariant(VariantInterface $variant);

    /**
     * Add variantGroup
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return ProductInterface
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * Get variantGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariantGroups();

    /**
     * Remove variantGroup
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return ProductInterface
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * Get variantGroupIdList
     *
     * @return array
     */
    public function getVariantGroupIdList();

    /**
     * Set variantGroupIdList
     *
     * @param array $variantGroupIdList
     *
     * @return ProductInterface
     */
    public function setVariantGroupIdList($variantGroupIdList);

    /**
     * Get variantIdList
     *
     * @return array
     */
    public function getVariantIdList();

    /**
     * Set variantIdList
     *
     * @param array $variantIdList
     *
     * @return ProductInterface
     */
    public function setVariantIdList($variantIdList);

    /**
     * Get variantMasterId
     *
     * @return integer
     */
    public function getVariantMasterId();

    /**
     * Set variantMasterId
     *
     * @param integer $variantMasterId
     *
     * @return ProductInterface
     */
    public function setVariantMasterId($variantMasterId);

    /**
     * Get vendorNumber
     *
     * @return string
     */
    public function getVendorNumber();

    /**
     * Set vendorNumber
     *
     * @param string $vendorNumber
     *
     * @return ProductInterface
     */
    public function setVendorNumber($vendorNumber);

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return ProductInterface
     */
    public function setWeight($weight);
}
