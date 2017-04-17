<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductInterface;

class ProductSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Product';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductInterface';

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
            ->setProductType($product->productType)
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

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
