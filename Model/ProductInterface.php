<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductInterface
{
    /**
     * @return string
     */
    public function getBarCodeNumber();

    /**
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
     * @return array
     */
    public function getCategoryIdList();

    /**
     * @param array $categoryIdList
     *
     * @return ProductInterface
     */
    public function setCategoryIdList($categoryIdList);

    /**
     * @return string
     */
    public function getComments();

    /**
     * @param string $comments
     *
     * @return ProductInterface
     */
    public function setComments($comments);

    /**
     * @return string
     */
    public function getCostPrice();

    /**
     * @param string $costPrice
     *
     * @return ProductInterface
     */
    public function setCostPrice($costPrice);

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @param \DateTime $created
     *
     * @return ProductInterface
     */
    public function setCreated($created);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param string $createdBy
     *
     * @return Product
     */
    public function setCreatedBy($createdBy);

    /**
     * @return int
     */
    public function getDefaultCategoryId();

    /**
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
     * @return array
     */
    public function getDisabledVariantIdList();

    /**
     * @param array $disabledVariantIdList
     *
     * @return ProductInterface
     */
    public function setDisabledVariantIdList($disabledVariantIdList);

    /**
     * @param string $edbPriserProductNumber
     *
     * @return ProductInterface
     */
    public function setEdbPriserProductNumber($edbPriserProductNumber);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return ProductInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFileSaleLink();

    /**
     * @param string $fileSaleLink
     *
     * @return ProductInterface
     */
    public function setFileSaleLink($fileSaleLink);

    /**
     * @return string
     */
    public function getGoogleFeedCategory();

    /**
     * @param string $googleFeedCategory
     *
     * @return ProductInterface
     */
    public function setGoogleFeedCategory($googleFeedCategory);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function getIsGiftCertificate();

    /**
     * @param bool $isGiftCertificate
     *
     * @return ProductInterface
     */
    public function setIsGiftCertificate($isGiftCertificate);

    /**
     * @return bool
     */
    public function getIsModified();

    /**
     * @param bool $isModified
     *
     * @return ProductInterface
     */
    public function setIsModified($isModified);

    /**
     * @return bool
     */
    public function getIsRateVariants();

    /**
     * @param bool $isRateVariants
     *
     * @return ProductInterface
     */
    public function setIsRateVariants($isRateVariants);

    /**
     * @return bool
     */
    public function getIsReviewVariants();

    /**
     * @param bool $isReviewVariants
     *
     * @return ProductInterface
     */
    public function setIsReviewVariants($isReviewVariants);

    /**
     * @return bool
     */
    public function getIsVariantMaster();

    /**
     * @param bool $isVariantMaster
     *
     * @return ProductInterface
     */
    public function setIsVariantMaster($isVariantMaster);

    /**
     * @return string
     */
    public function getLocationNumber();

    /**
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
     * @return array
     */
    public function getManufacturereIdList();

    /**
     * @param array $manufacturereIdList
     *
     * @return ProductInterface
     */
    public function setManufacturereIdList($manufacturereIdList);

    /**
     * @return int
     */
    public function getMaxBuyAmount();

    /**
     * @param int $maxBuyAmount
     *
     * @return ProductInterface
     */
    public function setMaxBuyAmount($maxBuyAmount);

    /**
     * Add media.
     *
     * @param MediaInterface $media
     *
     * @return ProductInterface
     */
    public function addMedia(MediaInterface $media);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias();

    /**
     * Remove media.
     *
     * @param MediaInterface $media
     *
     * @return ProductInterface
     */
    public function removeMedia(MediaInterface $media);

    /**
     * @return int
     */
    public function getMinBuyAmount();

    /**
     * @param int $minBuyAmount
     *
     * @return ProductInterface
     */
    public function setMinBuyAmount($minBuyAmount);

    /**
     * @return int
     */
    public function getMinBuyAmountB2B();

    /**
     * @param int $minBuyAmountB2B
     *
     * @return ProductInterface
     */
    public function setMinBuyAmountB2B($minBuyAmountB2B);

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @param string $number
     *
     * @return ProductInterface
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getPicture();

    /**
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
     * @return ProductTypeInterface
     */
    public function getProductType();

    /**
     * @param ProductTypeInterface $productType
     *
     * @return ProductInterface
     */
    public function setProductType(ProductTypeInterface $productType);

    /**
     * @return int
     */
    public function getSalesCount();

    /**
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
     * @return array
     */
    public function getSegmentIdList();

    /**
     * @param array $segmentIdList
     *
     * @return ProductInterface
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return ProductInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return int
     */
    public function getStockCount();

    /**
     * @param int $stockCount
     *
     * @return ProductInterface
     */
    public function setStockCount($stockCount);

    /**
     * @return int
     */
    public function getStockLimit();

    /**
     * @param int $stockLimit
     *
     * @return ProductInterface
     */
    public function setStockLimit($stockLimit);

    /**
     * @return int
     */
    public function getTypeId();

    /**
     * @param int $typeId
     *
     * @return ProductInterface
     */
    public function setTypeId($typeId);

    /**
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * @param \DateTime $updated
     *
     * @return ProductInterface
     */
    public function setUpdated($updated);

    /**
     * @return string
     */
    public function getUpdatedBy();

    /**
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
     * @return array
     */
    public function getVariantGroupIdList();

    /**
     * @param array $variantGroupIdList
     *
     * @return ProductInterface
     */
    public function setVariantGroupIdList($variantGroupIdList);

    /**
     * @return array
     */
    public function getVariantIdList();

    /**
     * @param array $variantIdList
     *
     * @return ProductInterface
     */
    public function setVariantIdList($variantIdList);

    /**
     * @return int
     */
    public function getVariantMasterId();

    /**
     * @param int $variantMasterId
     *
     * @return ProductInterface
     */
    public function setVariantMasterId($variantMasterId);

    /**
     * @return string
     */
    public function getVendorNumber();

    /**
     * @param string $vendorNumber
     *
     * @return ProductInterface
     */
    public function setVendorNumber($vendorNumber);

    /**
     * @return int
     */
    public function getWeight();

    /**
     * @param int $weight
     *
     * @return ProductInterface
     */
    public function setWeight($weight);
}
