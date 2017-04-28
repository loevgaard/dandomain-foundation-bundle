<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductInterface
{
    /**
     * Get barCodeNumber.
     *
     * @return string
     */
    public function getBarCodeNumber();

    /**
     * Set barCodeNumber.
     *
     * @param string $barCodeNumber
     *
     * @return ProductInterface
     */
    public function setBarCodeNumber($barCodeNumber);

    /**
     * Add category.
     *
     * @param CategoryInterface $category
     *
     * @return ProductInterface
     */
    public function addCategory(CategoryInterface $category);

    /**
     * Get categories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories();

    /**
     * Remove category.
     *
     * @param CategoryInterface $category
     *
     * @return ProductInterface
     */
    public function removeCategory(CategoryInterface $category);

    /**
     * Get categoryIdList.
     *
     * @return array
     */
    public function getCategoryIdList();

    /**
     * Set categoryIdList.
     *
     * @param array $categoryIdList
     *
     * @return ProductInterface
     */
    public function setCategoryIdList($categoryIdList);

    /**
     * Get comments.
     *
     * @return string
     */
    public function getComments();

    /**
     * Set comments.
     *
     * @param string $comments
     *
     * @return ProductInterface
     */
    public function setComments($comments);

    /**
     * Get costPrice.
     *
     * @return string
     */
    public function getCostPrice();

    /**
     * Set costPrice.
     *
     * @param string $costPrice
     *
     * @return ProductInterface
     */
    public function setCostPrice($costPrice);

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return ProductInterface
     */
    public function setCreated($created);

    /**
     * Get createdBy.
     *
     * @return string
     */
    public function getCreatedBy();

    /**
     * Set createdBy.
     *
     * @param string $createdBy
     *
     * @return Product
     */
    public function setCreatedBy($createdBy);

    /**
     * Get defaultCategoryId.
     *
     * @return int
     */
    public function getDefaultCategoryId();

    /**
     * Set defaultCategoryId.
     *
     * @param int $defaultCategoryId
     *
     * @return ProductInterface
     */
    public function setDefaultCategoryId($defaultCategoryId);

    /**
     * Add disabledVariant.
     *
     * @param VariantInterface $disabledVariant
     *
     * @return ProductInterface
     */
    public function addDisabledVariant(VariantInterface $disabledVariant);

    /**
     * Get disabledVariants.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisabledVariants();

    /**
     * Remove disabledVariant.
     *
     * @param VariantInterface $disabledVariant
     *
     * @return ProductInterface
     */
    public function removeDisabledVariant(VariantInterface $disabledVariant);

    /**
     * Get disabledVariantIdList.
     *
     * @return array
     */
    public function getDisabledVariantIdList();

    /**
     * Set disabledVariantIdList.
     *
     * @param array $disabledVariantIdList
     *
     * @return ProductInterface
     */
    public function setDisabledVariantIdList($disabledVariantIdList);

    /**
     * Set edbPriserProductNumber.
     *
     * @param string $edbPriserProductNumber
     *
     * @return ProductInterface
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber);

    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return ProductInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fileSaleLink.
     *
     * @return string
     */
    public function getFileSaleLink();

    /**
     * Set fileSaleLink.
     *
     * @param string $fileSaleLink
     *
     * @return ProductInterface
     */
    public function setFileSaleLink($fileSaleLink);

    /**
     * Get googleFeedCategory.
     *
     * @return string
     */
    public function getGoogleFeedCategory();

    /**
     * Set googleFeedCategory.
     *
     * @param string $googleFeedCategory
     *
     * @return ProductInterface
     */
    public function setGoogleFeedCategory($googleFeedCategory);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get isGiftCertificate.
     *
     * @return bool
     */
    public function getIsGiftCertificate();

    /**
     * Set isGiftCertificate.
     *
     * @param bool $isGiftCertificate
     *
     * @return ProductInterface
     */
    public function setIsGiftCertificate($isGiftCertificate);

    /**
     * Get isModified.
     *
     * @return bool
     */
    public function getIsModified();

    /**
     * Set isModified.
     *
     * @param bool $isModified
     *
     * @return ProductInterface
     */
    public function setIsModified($isModified);

    /**
     * Get isRateVariants.
     *
     * @return bool
     */
    public function getIsRateVariants();

    /**
     * Set isRateVariants.
     *
     * @param bool $isRateVariants
     *
     * @return ProductInterface
     */
    public function setIsRateVariants($isRateVariants);

    /**
     * Get isReviewVariants.
     *
     * @return bool
     */
    public function getIsReviewVariants();

    /**
     * Set isReviewVariants.
     *
     * @param bool $isReviewVariants
     *
     * @return ProductInterface
     */
    public function setIsReviewVariants($isReviewVariants);

    /**
     * Get isVariantMaster.
     *
     * @return bool
     */
    public function getIsVariantMaster();

    /**
     * Set isVariantMaster.
     *
     * @param bool $isVariantMaster
     *
     * @return ProductInterface
     */
    public function setIsVariantMaster($isVariantMaster);

    /**
     * Get locationNumber.
     *
     * @return string
     */
    public function getLocationNumber();

    /**
     * Set locationNumber.
     *
     * @param string $locationNumber
     *
     * @return ProductInterface
     */
    public function setLocationNumber($locationNumber);

    /**
     * Add manufacturer.
     *
     * @param ManufacturerInterface $manufacturer
     *
     * @return ProductInterface
     */
    public function addManufacturer(ManufacturerInterface $manufacturer);

    /**
     * Get manufacturers.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManufacturers();

    /**
     * Remove manufacturer.
     *
     * @param ManufacturerInterface $manufacturer
     *
     * @return ProductInterface
     */
    public function removeManufacturer(ManufacturerInterface $manufacturer);

    /**
     * Get manufacturereIdList.
     *
     * @return array
     */
    public function getManufacturereIdList();

    /**
     * Set manufacturereIdList.
     *
     * @param array $manufacturereIdList
     *
     * @return ProductInterface
     */
    public function setManufacturereIdList($manufacturereIdList);

    /**
     * Get maxBuyAmount.
     *
     * @return int
     */
    public function getMaxBuyAmount();

    /**
     * Set maxBuyAmount.
     *
     * @param int $maxBuyAmount
     *
     * @return ProductInterface
     */
    public function setMaxBuyAmount($maxBuyAmount);

    /**
     * Get medias.
     *
     * @return array
     */
    public function getMedias();

    /**
     * Set medias.
     *
     * @param array $medias
     *
     * @return ProductInterface
     */
    public function setMedias($medias);

    /**
     * Get minBuyAmount.
     *
     * @return int
     */
    public function getMinBuyAmount();

    /**
     * Set minBuyAmount.
     *
     * @param int $minBuyAmount
     *
     * @return ProductInterface
     */
    public function setMinBuyAmount($minBuyAmount);

    /**
     * Get minBuyAmountB2B.
     *
     * @return int
     */
    public function getMinBuyAmountB2B();

    /**
     * Set minBuyAmountB2B.
     *
     * @param int $minBuyAmountB2B
     *
     * @return ProductInterface
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B);

    /**
     * Get number.
     *
     * @return string
     */
    public function getNumber();

    /**
     * Set number.
     *
     * @param string $number
     *
     * @return ProductInterface
     */
    public function setNumber($number);

    /**
     * Get picture.
     *
     * @return string
     */
    public function getPicture();

    /**
     * Set picture.
     *
     * @param string $picture
     *
     * @return ProductInterface
     */
    public function setPicture($picture);

    /**
     * Add price.
     *
     * @param PriceInterface $price
     *
     * @return ProductInterface
     */
    public function addPrice(PriceInterface $price);

    /**
     * Get prices.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrices();

    /**
     * Remove price.
     *
     * @param PriceInterface $price
     *
     * @return ProductInterface
     */
    public function removePrice(PriceInterface $price);

    /**
     * Add productRelation.
     *
     * @param ProductRelationInterface $productRelation
     *
     * @return ProductInterface
     */
    public function addProductRelation(ProductRelationInterface $productRelation);

    /**
     * Get productRelations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductRelations();

    /**
     * Remove productRelation.
     *
     * @param ProductRelationInterface $productRelation
     *
     * @return ProductInterface
     */
    public function removeProductRelation(ProductRelationInterface $productRelation);

    /**
     * Get productType.
     *
     * @return ProductTypeInterface
     */
    public function getProductType();

    /**
     * Set productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductInterface
     */
    public function setProductType(ProductTypeInterface $productType);

    /**
     * Get salesCount.
     *
     * @return int
     */
    public function getSalesCount();

    /**
     * Set salesCount.
     *
     * @param int $salesCount
     *
     * @return ProductInterface
     */
    public function setSalesCount($salesCount);

    /**
     * Add segment.
     *
     * @param SegmentInterface $segment
     *
     * @return ProductInterface
     */
    public function addSegment(SegmentInterface $segment);

    /**
     * Get segments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSegments();

    /**
     * Remove segment.
     *
     * @param SegmentInterface $segment
     *
     * @return ProductInterface
     */
    public function removeSegment(SegmentInterface $segment);

    /**
     * Get segmentIdList.
     *
     * @return array
     */
    public function getSegmentIdList();

    /**
     * Set segmentIdList.
     *
     * @param array $segmentIdList
     *
     * @return ProductInterface
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * Add siteSetting.
     *
     * @param SiteSettingInterface $siteSetting
     *
     * @return ProductInterface
     */
    public function addSiteSetting(SiteSettingInterface $siteSetting);

    /**
     * Get siteSettings.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSiteSettings();

    /**
     * Remove siteSetting.
     *
     * @param SiteSettingInterface $siteSetting
     *
     * @return ProductInterface
     */
    public function removeSiteSetting(SiteSettingInterface $siteSetting);

    /**
     * Get sortOrder.
     *
     * @return int
     */
    public function getSortOrder();

    /**
     * Set sortOrder.
     *
     * @param int $sortOrder
     *
     * @return ProductInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get stockCount.
     *
     * @return int
     */
    public function getStockCount();

    /**
     * Set stockCount.
     *
     * @param int $stockCount
     *
     * @return ProductInterface
     */
    public function setStockCount($stockCount);

    /**
     * Get stockLimit.
     *
     * @return int
     */
    public function getStockLimit();

    /**
     * Set stockLimit.
     *
     * @param int $stockLimit
     *
     * @return ProductInterface
     */
    public function setStockLimit($stockLimit);

    /**
     * Get typeId.
     *
     * @return int
     */
    public function getTypeId();

    /**
     * Set typeId.
     *
     * @param int $typeId
     *
     * @return ProductInterface
     */
    public function setTypeId($typeId);

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return ProductInterface
     */
    public function setUpdated($updated);

    /**
     * Get updatedBy.
     *
     * @return string
     */
    public function getUpdatedBy();

    /**
     * Set updatedBy.
     *
     * @param string $updatedBy
     *
     * @return Product
     */
    public function setUpdatedBy($updatedBy);

    /**
     * Add variant.
     *
     * @param VariantInterface $variant
     *
     * @return ProductInterface
     */
    public function addVariant(VariantInterface $variant);

    /**
     * Get variants.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariants();

    /**
     * Remove variant.
     *
     * @param VariantInterface $variant
     *
     * @return ProductInterface
     */
    public function removeVariant(VariantInterface $variant);

    /**
     * Add variantGroup.
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return ProductInterface
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * Get variantGroups.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariantGroups();

    /**
     * Remove variantGroup.
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return ProductInterface
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * Get variantGroupIdList.
     *
     * @return array
     */
    public function getVariantGroupIdList();

    /**
     * Set variantGroupIdList.
     *
     * @param array $variantGroupIdList
     *
     * @return ProductInterface
     */
    public function setVariantGroupIdList($variantGroupIdList);

    /**
     * Get variantIdList.
     *
     * @return array
     */
    public function getVariantIdList();

    /**
     * Set variantIdList.
     *
     * @param array $variantIdList
     *
     * @return ProductInterface
     */
    public function setVariantIdList($variantIdList);

    /**
     * Get variantMasterId.
     *
     * @return int
     */
    public function getVariantMasterId();

    /**
     * Set variantMasterId.
     *
     * @param int $variantMasterId
     *
     * @return ProductInterface
     */
    public function setVariantMasterId($variantMasterId);

    /**
     * Get vendorNumber.
     *
     * @return string
     */
    public function getVendorNumber();

    /**
     * Set vendorNumber.
     *
     * @param string $vendorNumber
     *
     * @return ProductInterface
     */
    public function setVendorNumber($vendorNumber);

    /**
     * Get weight.
     *
     * @return int
     */
    public function getWeight();

    /**
     * Set weight.
     *
     * @param int $weight
     *
     * @return ProductInterface
     */
    public function setWeight($weight);
}
