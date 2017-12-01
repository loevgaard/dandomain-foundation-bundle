<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Period;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundation\Entity\Unit;
use Loevgaard\DandomainFoundationBundle\Entity\ManufacturerRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Entity\ProductRepositoryInterface;

class ProductUpdater
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ManufacturerRepositoryInterface
     */
    protected $manufacturerRepository;

    public function __construct(ProductRepositoryInterface $productRepository, ManufacturerRepositoryInterface $manufacturerRepository)
    {
        $this->productRepository = $productRepository;
        $this->manufacturerRepository = $manufacturerRepository;
    }

    public function hydrateFromApiResponse(array $data) : ProductInterface
    {
        $product = new Product();

        if ($data['created']) {
            $product->setCreated(DateTimeImmutable::createFromJson($data['created']));
        }

        if ($data['updated']) {
            $product->setUpdated(DateTimeImmutable::createFromJson($data['updated']));
        }

        $product
            ->setBarCodeNumber($data['barCodeNumber'])
            ->setCategoryIdList($data['categoryIdList'])
            ->setComments($data['comments'])
            ->setCostPrice($data['costPrice'])
            ->setCreatedBy($data['createdBy'])
            ->setDefaultCategoryId($data['defaultCategoryId'])
            ->setDisabledVariantIdList($data['disabledVariantIdList'])
            ->setEdbPriserProductNumber($data['edbPriserProductNumber'])
            ->setExternalId($data['id'])
            ->setFileSaleLink($data['fileSaleLink'])
            ->setGoogleFeedCategory($data['googleFeedCategory'])
            ->setIsGiftCertificate($data['isGiftCertificate'])
            ->setIsModified($data['isModified'])
            ->setIsRateVariants($data['isRateVariants'])
            ->setIsReviewVariants($data['isReviewVariants'])
            ->setIsVariantMaster($data['isVariantMaster'])
            ->setLocationNumber($data['locationNumber'])
            ->setManufacturereIdList($data['manufacturereIdList'])
            ->setMaxBuyAmount($data['maxBuyAmount'])
            ->setMinBuyAmount($data['minBuyAmount'])
            ->setMinBuyAmountB2B($data['minBuyAmountB2B'])
            ->setNumber($data['number'])
            ->setPicture($data['picture'])
            ->setSalesCount($data['salesCount'])
            ->setSegmentIdList($data['segmentIdList'])
            ->setSortOrder($data['sortOrder'])
            ->setStockCount($data['stockCount'])
            ->setStockLimit($data['stockLimit'])
            ->setTypeId($data['typeId'])
            ->setUpdatedBy($data['updatedBy'])
            ->setVariantGroupIdList($data['variantGroupIdList'])
            ->setVariantIdList($data['variantIdList'])
            ->setVariantMasterId($data['variantMasterId'])
            ->setVendorNumber($data['vendorNumber'])
            ->setWeight($data['weight'])
        ;

        foreach ($data['siteSettings'] as $siteSetting) {
            $expectedDeliveryTime = null;
            $expectedDeliveryTimeNotInStock = null;

            if ($siteSetting['expectedDeliveryTime']) {
                $expectedDeliveryTime = DateTimeImmutable::createFromJson($siteSetting['expectedDeliveryTime']);
            }

            if ($siteSetting['expectedDeliveryTimeNotInStock']) {
                $expectedDeliveryTimeNotInStock = DateTimeImmutable::createFromJson($siteSetting['expectedDeliveryTimeNotInStock']);
            }

            // @todo implement locale provider
            $product->translate($siteSetting['siteID'])->setCustomField01($siteSetting['customField01']);
            $product->translate($siteSetting['siteID'])->setCustomField02($siteSetting['customField02']);
            $product->translate($siteSetting['siteID'])->setCustomField03($siteSetting['customField03']);
            $product->translate($siteSetting['siteID'])->setCustomField04($siteSetting['customField04']);
            $product->translate($siteSetting['siteID'])->setCustomField05($siteSetting['customField05']);
            $product->translate($siteSetting['siteID'])->setCustomField06($siteSetting['customField06']);
            $product->translate($siteSetting['siteID'])->setCustomField07($siteSetting['customField07']);
            $product->translate($siteSetting['siteID'])->setCustomField08($siteSetting['customField08']);
            $product->translate($siteSetting['siteID'])->setCustomField09($siteSetting['customField09']);
            $product->translate($siteSetting['siteID'])->setCustomField10($siteSetting['customField10']);
            $product->translate($siteSetting['siteID'])->setGiftCertificatePdfBackgroundImage($siteSetting['giftCertificatePdfBackgroundImage']);
            $product->translate($siteSetting['siteID'])->setHidden($siteSetting['hidden']);
            $product->translate($siteSetting['siteID'])->setHiddenForMobile($siteSetting['hiddenForMobile']);
            $product->translate($siteSetting['siteID'])->setImageAltText($siteSetting['imageAltText']);
            $product->translate($siteSetting['siteID'])->setIsToplistHidden($siteSetting['isToplistHidden']);
            $product->translate($siteSetting['siteID'])->setKeyWords($siteSetting['keyWords']);
            $product->translate($siteSetting['siteID'])->setLongDescription($siteSetting['longDescription']);
            $product->translate($siteSetting['siteID'])->setLongDescription2($siteSetting['longDescription2']);
            $product->translate($siteSetting['siteID'])->setMetaDescription($siteSetting['metaDescription']);
            $product->translate($siteSetting['siteID'])->setName($siteSetting['name']);
            $product->translate($siteSetting['siteID'])->setPageTitle($siteSetting['pageTitle']);
            $product->translate($siteSetting['siteID'])->setRememberToBuyTextHeading($siteSetting['rememberToBuyTextHeading']);
            $product->translate($siteSetting['siteID'])->setRememberToBuyTextSubheading($siteSetting['rememberToBuyTextSubheading']);
            $product->translate($siteSetting['siteID'])->setRetailSalesPrice($siteSetting['retailSalesPrice']);
            $product->translate($siteSetting['siteID'])->setShortDescription($siteSetting['shortDescription']);
            $product->translate($siteSetting['siteID'])->setShowAsNew($siteSetting['showAsNew']);
            $product->translate($siteSetting['siteID'])->setShowOnFrontPage($siteSetting['showOnFrontPage']);
            $product->translate($siteSetting['siteID'])->setSiteId($siteSetting['siteID']);
            $product->translate($siteSetting['siteID'])->setSortOrder($siteSetting['sortOrder']);
            $product->translate($siteSetting['siteID'])->setTechDocLink($siteSetting['techDocLink']);
            $product->translate($siteSetting['siteID'])->setTechDocLink2($siteSetting['techDocLink2']);
            $product->translate($siteSetting['siteID'])->setTechDocLink3($siteSetting['techDocLink3']);
            $product->translate($siteSetting['siteID'])->setUnitNumber($siteSetting['unitNumber']);
            $product->translate($siteSetting['siteID'])->setUrlname($siteSetting['urlname']);
            $product->translate($siteSetting['siteID'])->setExpectedDeliveryTime($expectedDeliveryTime);
            $product->translate($siteSetting['siteID'])->setExpectedDeliveryTimeNotInStock($expectedDeliveryTimeNotInStock);

            if ($siteSetting['periodFrontPage']) {
                $periodFrontPage = new Period();
                $periodFrontPage->hydrate([
                    'externalId' => $siteSetting['periodFrontPage']['id'],
                    'title' => $siteSetting['periodFrontPage']['title'],
                    'disabled' => $siteSetting['periodFrontPage']['disabled'],
                    'startDate' => $siteSetting['periodFrontPage']['startDate'],
                    'endDate' => $siteSetting['periodFrontPage']['endDate'],
                ]);

                $product->translate($siteSetting['siteID'])->setPeriodFrontPage($periodFrontPage);
            }

            if ($siteSetting['periodHidden']) {
                $periodHidden = new Period();
                $periodHidden->hydrate([
                    'externalId' => $siteSetting['periodHidden']['id'],
                    'title' => $siteSetting['periodHidden']['title'],
                    'disabled' => $siteSetting['periodHidden']['disabled'],
                    'startDate' => $siteSetting['periodHidden']['startDate'],
                    'endDate' => $siteSetting['periodHidden']['endDate'],
                ]);

                $product->translate($siteSetting['siteID'])->setPeriodHidden($periodHidden);
            }

            if ($siteSetting['periodNew']) {
                $periodNew = new Period();
                $periodNew->hydrate([
                    'externalId' => $siteSetting['periodNew']['id'],
                    'title' => $siteSetting['periodNew']['title'],
                    'disabled' => $siteSetting['periodNew']['disabled'],
                    'startDate' => $siteSetting['periodNew']['startDate'],
                    'endDate' => $siteSetting['periodNew']['endDate'],
                ]);

                $product->translate($siteSetting['siteID'])->setPeriodNew($periodNew);
            }

            if ($siteSetting['unit']) {
                $unit = new Unit();
                $unit->hydrate([
                    'externalId' => $siteSetting['unit']['id'],
                    'text' => $siteSetting['unit']['text']
                ]);

                $product->translate($siteSetting['siteID'])->setUnit($unit);
            }

            $product->mergeNewTranslations();
        }

        foreach ($data['manufacturers'] as $item) {
            $manufacturer = new Manufacturer();
            $manufacturer->hydrate([
                'externalId' => $item['id'],
                'link' => $item['link'],
                'linkText' => $item['linkText'],
                'name' => $item['name'],
            ]);

            $product->addManufacturer($manufacturer);
        }

        /*
         * @todo outcomment this and fix it
         */

//        if (is_array($data['disabledVariants'])) {
//            foreach ($data['disabledVariants'] as $disabledVariantData) {
//                $disabledVariant = new Variant();
//                $disabledVariant->populateFromApiResponse($disabledVariantData);
//                $this->addDisabledVariant($disabledVariant);
//            }
//        }
//
//        if (is_array($data['media'])) {
//            foreach ($data['media'] as $mediaTmp) {
//                $medium = new Medium();
//                $medium->populateFromApiResponse($mediaTmp);
//                $this->addMedium($medium);
//            }
//        }
//
//        if (is_array($data['productCategories'])) {
//            foreach ($data['productCategories'] as $categoryData) {
//                $category = new Category();
//                $category->populateFromApiResponse($categoryData);
//                $this->addCategory($category);
//            }
//        }
//
//
//        if (is_array($data['prices'])) {
//            foreach ($data['prices'] as $priceData) {
//                $price = new Price();
//                $price->populateFromApiResponse($priceData);
//                $this->addPrice($price);
//            }
//        }
//
//        if (is_array($data['productRelations'])) {
//            foreach ($data['productRelations'] as $productRelationData) {
//                $productRelation = new ProductRelation();
//                $productRelation->populateFromApiResponse($productRelationData);
//                $this->addProductRelation($productRelation);
//            }
//        }
//
//        if ($data['productType']) {
//            $productType = new ProductType();
//            $productType->populateFromApiResponse($data['productType']);
//            $this->setProductType($productType);
//        }
//
//        if (is_array($data['segments'])) {
//            foreach ($data['segments'] as $segmentData) {
//                $segment = new Segment();
//                $segment->$productRelation($segmentData);
//                $this->addSegment($segment);
//            }
//        }
//
//        if (is_array($data['variants'])) {
//            foreach ($data['variants'] as $variantData) {
//                $variant = new Variant();
//                $variant->$productRelation($variantData);
//                $this->addVariant($variant);
//            }
//        }
//
//        if (is_array($data['variantGroups'])) {
//            foreach ($data['variantGroups'] as $variantGroupData) {
//                $variantGroup = new VariantGroup();
//                $variantGroup->$productRelation($variantGroupData);
//                $this->addVariantGroup($variantGroup);
//            }
//        }

        return $product;
    }

    /**
     * This method will take data from the Dandomain API DataProduct response
     * and return an entity
     *
     * If the entity already exists, that entity will have its properties updated
     *
     * @param array $data
     * @return ProductInterface
     */
    public function updateFromApiResponse(array $data) : ProductInterface
    {
        $product = $this->hydrateFromApiResponse($data);

        $entity = $this->productRepository->findOneByExternalId($product->getExternalId());
        if ($entity) {
            $this->replace($entity, $product);
        } else {
            $entity = $product;
        }

        return $entity;
    }

    /**
     * Will replace $product2 into $product1
     *
     * @param ProductInterface $product1
     * @param ProductInterface $product2
     */
    public function replace(ProductInterface $product1, ProductInterface $product2)
    {
        $product1
            ->setBarCodeNumber($product2->getBarCodeNumber())
            ->setCategoryIdList($product2->getCategoryIdList())
            ->setComments($product2->getComments())
            ->setCostPrice($product2->getCostPrice())
            ->setCreatedBy($product2->getCreatedBy())
            ->setDefaultCategoryId($product2->getDefaultCategoryId())
            ->setDisabledVariantIdList($product2->getDisabledVariantIdList())
            ->setEdbPriserProductNumber($product2->getEdbPriserProductNumber())
            ->setExternalId($product2->getExternalId())
            ->setFileSaleLink($product2->getFileSaleLink())
            ->setGoogleFeedCategory($product2->getGoogleFeedCategory())
            ->setIsGiftCertificate($product2->getisGiftCertificate())
            ->setIsModified($product2->getisModified())
            ->setIsRateVariants($product2->getisRateVariants())
            ->setIsReviewVariants($product2->getisReviewVariants())
            ->setIsVariantMaster($product2->getisVariantMaster())
            ->setLocationNumber($product2->getLocationNumber())
            ->setManufacturereIdList($product2->getManufacturereIdList())
            ->setMaxBuyAmount($product2->getMaxBuyAmount())
            ->setMinBuyAmount($product2->getMinBuyAmount())
            ->setMinBuyAmountB2B($product2->getMinBuyAmountB2B())
            ->setNumber($product2->getNumber())
            ->setPicture($product2->getPicture())
            ->setSalesCount($product2->getSalesCount())
            ->setSegmentIdList($product2->getSegmentIdList())
            ->setSortOrder($product2->getSortOrder())
            ->setStockCount($product2->getStockCount())
            ->setStockLimit($product2->getStockLimit())
            ->setTypeId($product2->getTypeId())
            ->setUpdatedBy($product2->getUpdatedBy())
            ->setVariantGroupIdList($product2->getVariantGroupIdList())
            ->setVariantIdList($product2->getVariantIdList())
            ->setVariantMasterId($product2->getVariantMasterId())
            ->setVendorNumber($product2->getVendorNumber())
            ->setWeight($product2->getWeight())
            ->setCreated($product2->getCreated())
            ->setUpdated($product2->getUpdated())
        ;

        // @todo replace embedded properties
    }

    /*
    public function updateFromApiResponse(array $data) : ProductInterface
    {
        $entity = $this->productRepository->findOneByExternalId((int)$data['id']);

        if (!$entity) {
            $entity = new Product();
        }

        $entity->populateFromApiResponse($data);

        $this->updateManufacturersFromApiResponse($entity, $data['manufacturers'] ?? []);

        return $entity;
    }

    public function updateManufacturersFromApiResponse(ProductInterface $product, array $data)
    {
        foreach ($data as $item) {
            $manufacturer = $this->manufacturerRepository->findOneByExternalId($item['id']);

            if(!$manufacturer) {
                $manufacturer = new Manufacturer();
                $manufacturer->populateFromApiResponse($item);
            }

            $product->addManufacturer($manufacturer);
        }
    }
    */
}