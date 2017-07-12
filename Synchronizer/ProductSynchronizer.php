<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use GuzzleHttp\Exception\ClientException;
use Loevgaard\DandomainFoundationBundle\Model\Product;
use Loevgaard\DandomainFoundationBundle\Model\ProductInterface;
use Loevgaard\DandomainFoundationBundle\Model\TranslatableInterface;

class ProductSynchronizer extends Synchronizer
{
    /**
     * @var CategorySynchronizer
     */
    protected $categorySynchronizer;

    /**
     * @var ManufacturerSynchronizer
     */
    protected $manufacturerSynchronizer;

    /**
     * @var MediaSynchronizer
     */
    protected $mediaSynchronizer;

    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Product';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductInterface';

    /**
     * @var PeriodSynchronizer
     */
    protected $periodSynchronizer;

    /**
     * @var PriceSynchronizer
     */
    protected $priceSynchronizer;

    /**
     * @var ProductRelationSynchronizer
     */
    protected $productRelationSynchronizer;

    /**
     * @var ProductTypeSynchronizer
     */
    protected $productTypeSynchronizer;

    /**
     * @var SegmentSynchronizer
     */
    protected $segmentSynchronizer;

    /**
     * @var UnitSynchronizer
     */
    protected $unitSynchronizer;

    /**
     * @var VariantSynchronizer
     */
    protected $variantSynchronizer;

    /**
     * @var VariantGroupSynchronizer
     */
    protected $variantGroupSynchronizer;

    /**
     * @param CategorySynchronizer $categorySynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setCategorySynchronizer(CategorySynchronizer $categorySynchronizer)
    {
        $this->categorySynchronizer = $categorySynchronizer;

        return $this;
    }

    /**
     * @param ManufacturerSynchronizer $manufacturerSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setManufacturerSynchronizer(ManufacturerSynchronizer $manufacturerSynchronizer)
    {
        $this->manufacturerSynchronizer = $manufacturerSynchronizer;

        return $this;
    }

    /**
     * @param MediaSynchronizer $mediaSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setMediaSynchronizer(MediaSynchronizer $mediaSynchronizer)
    {
        $this->mediaSynchronizer = $mediaSynchronizer;

        return $this;
    }

    /**
     * @param PeriodSynchronizer $periodSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setPeriodSynchronizer(PeriodSynchronizer $periodSynchronizer)
    {
        $this->periodSynchronizer = $periodSynchronizer;

        return $this;
    }

    /**
     * @param PriceSynchronizer $priceSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setPriceSynchronizer(PriceSynchronizer $priceSynchronizer)
    {
        $this->priceSynchronizer = $priceSynchronizer;

        return $this;
    }

    /**
     * @param ProductRelationSynchronizer $productRelationSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setProductRelationSynchronizer(ProductRelationSynchronizer $productRelationSynchronizer)
    {
        $this->productRelationSynchronizer = $productRelationSynchronizer;

        return $this;
    }

    /**
     * @param ProductTypeSynchronizer $productTypeSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setProductTypeSynchronizer(ProductTypeSynchronizer $productTypeSynchronizer)
    {
        $this->productTypeSynchronizer = $productTypeSynchronizer;

        return $this;
    }

    /**
     * @param SegmentSynchronizer $segmentSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setSegmentSynchronizer(SegmentSynchronizer $segmentSynchronizer)
    {
        $this->segmentSynchronizer = $segmentSynchronizer;

        return $this;
    }

    /**
     * @param UnitSynchronizer $unitSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setUnitSynchronizer(UnitSynchronizer $unitSynchronizer)
    {
        $this->unitSynchronizer = $unitSynchronizer;

        return $this;
    }

    /**
     * @param VariantSynchronizer $variantSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setVariantSynchronizer(VariantSynchronizer $variantSynchronizer)
    {
        $this->variantSynchronizer = $variantSynchronizer;

        return $this;
    }

    /**
     * @param VariantGroupSynchronizer $variantGroupSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setVariantGroupSynchronizer(VariantGroupSynchronizer $variantGroupSynchronizer)
    {
        $this->variantGroupSynchronizer = $variantGroupSynchronizer;

        return $this;
    }

    /**
     * Synchronizes Product.
     *
     * @param string|\stdClass $product
     * @param bool             $flush
     *
     * @return ProductInterface|null
     */
    public function syncProduct($product, $flush = true)
    {
        try {
            if (is_string($product)) {
                $product = \GuzzleHttp\json_decode($this->api->productData->getDataProduct($product)->getBody()->getContents());
            }
        } catch (ClientException $e) {
            return null;
        }

        /** @var ProductInterface $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'number' => $product->number,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        if ($product->created) {
            $created = \Dandomain\Api\jsonDateToDate($product->created);
            $created->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $created = null;
        }

        if ($product->updated) {
            $updated = \Dandomain\Api\jsonDateToDate($product->updated);
            $updated->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $updated = null;
        }

        $entity
            ->setBarCodeNumber($product->barCodeNumber ? : null)
            ->setCategoryIdList($product->categoryIdList ? : null)
            ->setComments($product->comments ? : null)
            ->setCostPrice($product->costPrice ? : null)
            ->setCreatedBy($product->createdBy ? : null)
            ->setDefaultCategoryId($product->defaultCategoryId ? : null)
            ->setDisabledVariantIdList($product->disabledVariantIdList ? : null)
            ->setEdbPriserProductNumber($product->edbPriserProductNumber ? : null)
            ->setExternalId($product->id ? : null)
            ->setFileSaleLink($product->fileSaleLink ? : null)
            ->setGoogleFeedCategory($product->googleFeedCategory ? : null)
            ->setIsGiftCertificate($product->isGiftCertificate)
            ->setIsModified($product->isModified)
            ->setIsRateVariants($product->isRateVariants)
            ->setIsReviewVariants($product->isReviewVariants)
            ->setIsVariantMaster($product->isVariantMaster)
            ->setLocationNumber($product->locationNumber ? : null)
            ->setManufacturereIdList($product->manufacturereIdList ? : null)
            ->setMaxBuyAmount($product->maxBuyAmount ? : null)
            ->setMinBuyAmount($product->minBuyAmount ? : null)
            ->setMinBuyAmountB2B($product->minBuyAmountB2B ? : null)
            ->setNumber($product->number ? : null)
            ->setPicture($product->picture ? : null)
            ->setSalesCount($product->salesCount ? : null)
            ->setSegmentIdList($product->segmentIdList ? : null)
            ->setSortOrder($product->sortOrder ? : null)
            ->setStockCount($product->stockCount ? : null)
            ->setStockLimit($product->stockLimit ? : null)
            ->setTypeId($product->typeId ? : null)
            ->setUpdatedBy($product->updatedBy ? : null)
            ->setVariantGroupIdList($product->variantGroupIdList ? : null)
            ->setVariantIdList($product->variantIdList ? : null)
            ->setVariantMasterId($product->variantMasterId ? : null)
            ->setVendorNumber($product->vendorNumber ? : null)
            ->setWeight($product->weight ? : null)
        ;

        if (null !== $created) {
            $entity->setCreated($created);
        }

        if (null !== $updated) {
            $entity->setUpdated($updated);
        }

        if (is_array($product->disabledVariants)) {
            foreach ($product->disabledVariants as $disabledVariantTmp) {
                $disabledVariant = $this->variantSynchronizer->syncVariant($disabledVariantTmp, $flush);
                $entity->addDisabledVariant($disabledVariant);
            }
        }

        if (is_array($product->media)) {
            foreach ($product->media as $mediaTmp) {
                $media = $this->mediaSynchronizer->syncMedia($mediaTmp, $flush);
                $entity->addMedia($media);
            }
        }

        if (is_array($product->productCategories)) {
            foreach ($product->productCategories as $categoryTmp) {
                $category = $this->categorySynchronizer->syncCategory($categoryTmp, $flush);
                $entity->addCategory($category);
            }
        }

        if (is_array($product->manufacturers)) {
            foreach ($product->manufacturers as $manufacturerTmp) {
                $manufacturer = $this->manufacturerSynchronizer->syncManufacturer($manufacturerTmp, $flush);
                $entity->addManufacturer($manufacturer);
            }
        }

        if (is_array($product->prices)) {
            foreach ($product->prices as $priceTmp) {
                $price = $this->priceSynchronizer->syncPrice($priceTmp, $flush);
                $entity->addPrice($price);
            }
        }

        if (is_array($product->productRelations)) {
            foreach ($product->productRelations as $productRelationTmp) {
                $productRelation = $this->productRelationSynchronizer->syncProductRelation($productRelationTmp, $flush);
                $entity->addProductRelation($productRelation);
            }
        }

        if (($entity instanceof TranslatableInterface) && is_array($product->siteSettings)) {
            foreach ($product->siteSettings as $siteSettingTmp) {
                if ($siteSettingTmp->expectedDeliveryTime) {
                    try {
                        $expectedDeliveryTime = \Dandomain\Api\jsonDateToDate($siteSettingTmp->expectedDeliveryTime);
                        $expectedDeliveryTime->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
                    } catch (\Exception $e) {
                        $expectedDeliveryTime = null;
                    }
                } else {
                    $expectedDeliveryTime = null;
                }

                if ($siteSettingTmp->expectedDeliveryTimeNotInStock) {
                    try {
                        $expectedDeliveryTimeNotInStock = \Dandomain\Api\jsonDateToDate($siteSettingTmp->expectedDeliveryTimeNotInStock);
                        $expectedDeliveryTimeNotInStock->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
                    } catch (\Exception $e) {
                        $expectedDeliveryTimeNotInStock = null;
                    }
                } else {
                    $expectedDeliveryTimeNotInStock = null;
                }

                $entity->translate($siteSettingTmp->siteID)->setCustomField01($siteSettingTmp->customField01);
                $entity->translate($siteSettingTmp->siteID)->setCustomField02($siteSettingTmp->customField02);
                $entity->translate($siteSettingTmp->siteID)->setCustomField03($siteSettingTmp->customField03);
                $entity->translate($siteSettingTmp->siteID)->setCustomField04($siteSettingTmp->customField04);
                $entity->translate($siteSettingTmp->siteID)->setCustomField05($siteSettingTmp->customField05);
                $entity->translate($siteSettingTmp->siteID)->setCustomField06($siteSettingTmp->customField06);
                $entity->translate($siteSettingTmp->siteID)->setCustomField07($siteSettingTmp->customField07);
                $entity->translate($siteSettingTmp->siteID)->setCustomField08($siteSettingTmp->customField08);
                $entity->translate($siteSettingTmp->siteID)->setCustomField09($siteSettingTmp->customField09);
                $entity->translate($siteSettingTmp->siteID)->setCustomField10($siteSettingTmp->customField10);
                $entity->translate($siteSettingTmp->siteID)->setGiftCertificatePdfBackgroundImage($siteSettingTmp->giftCertificatePdfBackgroundImage);
                $entity->translate($siteSettingTmp->siteID)->setHidden($siteSettingTmp->hidden);
                $entity->translate($siteSettingTmp->siteID)->setHiddenForMobile($siteSettingTmp->hiddenForMobile);
                $entity->translate($siteSettingTmp->siteID)->setImageAltText($siteSettingTmp->imageAltText);
                $entity->translate($siteSettingTmp->siteID)->setIsToplistHidden($siteSettingTmp->isToplistHidden);
                $entity->translate($siteSettingTmp->siteID)->setKeyWords($siteSettingTmp->keyWords);
                $entity->translate($siteSettingTmp->siteID)->setLongDescription($siteSettingTmp->longDescription);
                $entity->translate($siteSettingTmp->siteID)->setLongDescription2($siteSettingTmp->longDescription2);
                $entity->translate($siteSettingTmp->siteID)->setMetaDescription($siteSettingTmp->metaDescription);
                $entity->translate($siteSettingTmp->siteID)->setName($siteSettingTmp->name);
                $entity->translate($siteSettingTmp->siteID)->setPageTitle($siteSettingTmp->pageTitle);
                $entity->translate($siteSettingTmp->siteID)->setRememberToBuyTextHeading($siteSettingTmp->rememberToBuyTextHeading);
                $entity->translate($siteSettingTmp->siteID)->setRememberToBuyTextSubheading($siteSettingTmp->rememberToBuyTextSubheading);
                $entity->translate($siteSettingTmp->siteID)->setRetailSalesPrice($siteSettingTmp->retailSalesPrice);
                $entity->translate($siteSettingTmp->siteID)->setShortDescription($siteSettingTmp->shortDescription);
                $entity->translate($siteSettingTmp->siteID)->setShowAsNew($siteSettingTmp->showAsNew);
                $entity->translate($siteSettingTmp->siteID)->setShowOnFrontPage($siteSettingTmp->showOnFrontPage);
                $entity->translate($siteSettingTmp->siteID)->setSiteId($siteSettingTmp->siteID);
                $entity->translate($siteSettingTmp->siteID)->setSortOrder($siteSettingTmp->sortOrder);
                $entity->translate($siteSettingTmp->siteID)->setTechDocLink($siteSettingTmp->techDocLink);
                $entity->translate($siteSettingTmp->siteID)->setTechDocLink2($siteSettingTmp->techDocLink2);
                $entity->translate($siteSettingTmp->siteID)->setTechDocLink3($siteSettingTmp->techDocLink3);
                $entity->translate($siteSettingTmp->siteID)->setUnitNumber($siteSettingTmp->unitNumber);
                $entity->translate($siteSettingTmp->siteID)->setUrlname($siteSettingTmp->urlname);

                if (null !== $expectedDeliveryTime) {
                    $entity->translate($siteSettingTmp->siteID)->setExpectedDeliveryTime($expectedDeliveryTime);
                }

                if (null !== $expectedDeliveryTimeNotInStock) {
                    $entity->translate($siteSettingTmp->siteID)->setExpectedDeliveryTimeNotInStock($expectedDeliveryTimeNotInStock);
                }

                if ($siteSettingTmp->periodFrontPage) {
                    $periodFrontPage = $this->periodSynchronizer->syncPeriod($siteSettingTmp->periodFrontPage, $flush);
                    $entity->translate($siteSettingTmp->siteID)->setPeriodFrontPage($periodFrontPage);
                }

                if ($siteSettingTmp->periodHidden) {
                    $periodHidden = $this->periodSynchronizer->syncPeriod($siteSettingTmp->periodHidden, $flush);
                    $entity->translate($siteSettingTmp->siteID)->setPeriodHidden($periodHidden);
                }

                if ($siteSettingTmp->periodNew) {
                    $periodNew = $this->periodSynchronizer->syncPeriod($siteSettingTmp->periodNew, $flush);
                    $entity->translate($siteSettingTmp->siteID)->setPeriodNew($periodNew);
                }

                if ($siteSettingTmp->unit) {
                    $unit = $this->unitSynchronizer->syncUnit($siteSettingTmp->unit, $flush);
                    $entity->translate($siteSettingTmp->siteID)->setUnit($unit);
                }

                $entity->mergeNewTranslations();
            }
        }

        if ($product->productType) {
            $productType = $this->productTypeSynchronizer->syncProductType($product->productType, $flush);
            $entity->setProductType($productType);
        }

        if (is_array($product->segments)) {
            foreach ($product->segments as $segmentTmp) {
                $segment = $this->segmentSynchronizer->syncSegment($segmentTmp, $flush);
                $entity->addSegment($segment);
            }
        }

        if (is_array($product->variants)) {
            foreach ($product->variants as $variantTmp) {
                $variant = $this->variantSynchronizer->syncVariant($variantTmp, $flush);
                $entity->addVariant($variant);
            }
        }

        if (is_array($product->variantGroups)) {
            foreach ($product->variantGroups as $variantGroupTmp) {
                $variantGroup = $this->variantGroupSynchronizer->syncVariantGroup($variantGroupTmp, $flush);
                $entity->addVariantGroup($variantGroup);
            }
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
