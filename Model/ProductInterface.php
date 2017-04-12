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
     * @return Product
     */
    public function setBarCodeNumber($barCodeNumber);

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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
     */
    public function setLocationNumber($locationNumber);

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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
     */
    public function setPicture($picture);

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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
     */
    public function setUpdated($updated);

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
     * @return Product
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
     * @return Product
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
     * @return Product
     */
    public function setVariantMasterId($variantMasterId);

    /**
     * Get vendorNumber
     *
     * @return string
     */
    public function getVendorNumber();

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();

    /**
     * Set vendorNumber
     *
     * @param string $vendorNumber
     *
     * @return Product
     */
    public function setVendorNumber($vendorNumber);

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Product
     */
    public function setWeight($weight);
}
