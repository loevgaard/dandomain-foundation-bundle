<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductInterface;

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
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Product';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductInterface';

    /**
     * @var PriceSynchronizer
     */
    protected $priceSynchronizer;

    /**
     * @var ProductTypeSynchronizer
     */
    protected $productTypeSynchronizer;

    /**
     * @var VariantSynchronizer
     */
    protected $variantSynchronizer;

    /**
     * @var VariantGroupSynchronizer
     */
    protected $variantGroupSynchronizer;

    /**
     * Set CategorySynchronizer.
     *
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
     * Set ManufacturerSynchronizer.
     *
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
     * Set PriceSynchronizer.
     *
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
     * Set ProductTypeSynchronizer.
     *
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
     * Set VariantSynchronizer.
     *
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
     * Set VariantGroupSynchronizer.
     *
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
     * @param array $product
     * @param bool  $flush
     *
     * @return ProductInterface
     */
    public function syncProduct($product, $flush = true)
    {
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
if ($product->productType) {
var_dump($product->productType);
var_dump($product);
}
        $entity
            ->setBarCodeNumber($product->barCodeNumber)
            ->setCategoryIdList($product->categoryIdList)
            ->setComments($product->comments)
            ->setCostPrice($product->costPrice)
            ->setCreatedBy($product->createdBy)
            ->setDefaultCategoryId($product->defaultCategoryId)
            ->setDisabledVariantIdList($product->disabledVariantIdList)
            ->setEdbPriserProductNumber($product->edbPriserProductNumber)
            ->setExternalId($product->id)
            ->setFileSaleLink($product->fileSaleLink)
            ->setGoogleFeedCategory($product->googleFeedCategory)
            ->setIsGiftCertificate($product->isGiftCertificate)
            ->setIsModified($product->isModified)
            ->setIsRateVariants($product->isRateVariants)
            ->setIsReviewVariants($product->isReviewVariants)
            ->setIsVariantMaster($product->isVariantMaster)
            ->setLocationNumber($product->locationNumber)
            ->setManufacturereIdList($product->manufacturereIdList)
            ->setMaxBuyAmount($product->maxBuyAmount)
            ->setMedias($product->media)
            ->setMinBuyAmount($product->minBuyAmount)
            ->setMinBuyAmountB2B($product->minBuyAmountB2B)
            ->setNumber($product->number)
            ->setPicture($product->picture)
            ->setProductRelations($product->productRelations)
            ->setSalesCount($product->salesCount)
            ->setSegmentIdList($product->segmentIdList)
            ->setSiteSettings($product->siteSettings)
            ->setSortOrder($product->sortOrder)
            ->setStockCount($product->stockCount)
            ->setStockLimit($product->stockLimit)
            ->setTypeId($product->typeId)
            ->setUpdatedBy($product->updatedBy)
            ->setVariantGroupIdList($product->variantGroupIdList)
            ->setVariantIdList($product->variantIdList)
            ->setVariantMasterId($product->variantMasterId)
            ->setVendorNumber($product->vendorNumber)
            ->setWeight($product->weight)
        ;

        if (null !== $created) {
            $entity->setCreated($created);
        }

        if (null !== $updated) {
            $entity->setUpdated($updated);
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

        if ($product->productType) {
            $productType = $this->productTypeSynchronizer->syncProductType($product->productType, $flush);
            $entity->setProductType($productType);
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
