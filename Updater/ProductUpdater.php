<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Brick\Math\BigDecimal;
use Doctrine\Common\Collections\Collection;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Period;
use Loevgaard\DandomainFoundation\Entity\Price;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundation\Entity\Unit;
use Loevgaard\DandomainFoundation\Entity\VariantGroup;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;
use Loevgaard\DandomainFoundation\Repository\ManufacturerRepository;
use Loevgaard\DandomainFoundation\Repository\PeriodRepository;
use Loevgaard\DandomainFoundation\Repository\ProductRepository;
use Loevgaard\DandomainFoundation\Repository\VariantGroupRepository;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CurrencySynchronizerInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\PeriodSynchronizerInterface;

class ProductUpdater implements ProductUpdaterInterface
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ManufacturerRepository
     */
    protected $manufacturerRepository;

    /**
     * @var VariantGroupRepository
     */
    protected $variantGroupRepository;

    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * @var CurrencySynchronizerInterface
     */
    protected $currencySynchronizer;

    /**
     * @var PeriodRepository
     */
    protected $periodRepository;

    /**
     * @var PeriodSynchronizerInterface
     */
    protected $periodSynchronizer;

    public function __construct(
        ProductRepository $productRepository,
        ManufacturerRepository $manufacturerRepository,
        VariantGroupRepository $variantGroupRepository,
        CurrencyRepository $currencyRepository,
        CurrencySynchronizerInterface $currencySynchronizer,
        PeriodRepository $periodRepository,
        PeriodSynchronizerInterface $periodSynchronizer
    ) {
        $this->productRepository = $productRepository;
        $this->manufacturerRepository = $manufacturerRepository;
        $this->variantGroupRepository = $variantGroupRepository;
        $this->currencyRepository = $currencyRepository;
        $this->currencySynchronizer = $currencySynchronizer;
        $this->periodRepository = $periodRepository;
        $this->periodSynchronizer = $periodSynchronizer;
    }

    public function updateFromApiResponse(array $data): ProductInterface
    {
        $product = $this->productRepository->findOneByExternalId($data['id']);
        if (!$product) {
            $product = new Product();
        }

        $product->hydrate($data, true);
        $product
            ->setCategoryIdList($data['categoryIdList'])
            ->setDisabledVariantIdList($data['disabledVariantIdList'])
            ->setSegmentIdList($data['segmentIdList'])
            ->setVariantIdList($data['variantIdList'])
        ;

        foreach ($data['siteSettings'] as $siteSetting) {
            // @todo implement locale provider
            $productTranslation = $product->translate($siteSetting['siteID']);
            $productTranslation->hydrate($siteSetting, true);

            if ($siteSetting['periodFrontPage']) {
                $periodFrontPage = new Period();
                $periodFrontPage->hydrate($siteSetting['periodFrontPage'], true);

                $product->translate($siteSetting['siteID'])->setPeriodFrontPage($periodFrontPage);
            }

            if ($siteSetting['periodHidden']) {
                $periodHidden = new Period();
                $periodHidden->hydrate($siteSetting['periodHidden'], true);

                $product->translate($siteSetting['siteID'])->setPeriodHidden($periodHidden);
            }

            if ($siteSetting['periodNew']) {
                $periodNew = new Period();
                $periodNew->hydrate($siteSetting['periodNew'], true);

                $product->translate($siteSetting['siteID'])->setPeriodNew($periodNew);
            }

            if ($siteSetting['unit']) {
                $unit = new Unit();
                $unit->hydrate($siteSetting['unit'], true);

                $product->translate($siteSetting['siteID'])->setUnit($unit);
            }

            $product->mergeNewTranslations();
        }

        /*
         * Update manufacturers
         */
        if (empty($data['manufacturereIdList'])) {
            $product->setManufacturereIdList(null);
            $product->clearManufacturers();
        } else {
            $manufacturerIdsToAdd = $this->updateCollection($product->getManufacturereIdList() ?? [],
                $data['manufacturereIdList'] ?? [], $product->getManufacturers());

            foreach ($data['manufacturers'] as $manufacturerData) {
                if (in_array($manufacturerData['id'], $manufacturerIdsToAdd)) {
                    $manufacturer = $this->manufacturerRepository->findOneByExternalId($manufacturerData['id']);
                    if (!$manufacturer) {
                        $manufacturer = new Manufacturer();

                        // only update properties if it's a new object
                        $manufacturer->hydrate($manufacturerData, true);
                    }

                    $product->addManufacturer($manufacturer);
                }
            }
            $product->setManufacturereIdList($data['manufacturereIdList']);
        }

        /*
         * Update variant groups
         */
        if (empty($data['variantGroupIdList'])) {
            $product->setVariantGroupIdList(null);
            $product->clearVariantGroups();
        } else {
            $variantGroupIdsToAdd = $this->updateCollection($product->getVariantGroupIdList() ?? [],
                $data['variantGroupIdList'] ?? [], $product->getVariantGroups());

            foreach ($data['variantGroups'] as $variantGroupData) {
                if (in_array($variantGroupData['id'], $variantGroupIdsToAdd)) {
                    $variantGroup = $this->variantGroupRepository->findOneByExternalId($variantGroupData['id']);
                    if (!$variantGroup) {
                        $variantGroup = new VariantGroup();

                        // only update properties if it's a new object
                        $variantGroup->hydrate($variantGroupData, true);
                    }

                    $product->addVariantGroup($variantGroup);
                }
            }
            $product->setVariantGroupIdList($data['variantGroupIdList']);
        }

        /*
         * Update prices
         */
        if(empty($data['prices'])) {
            $product->setPriceLess(true);
            $product->clearPrices();
        } else {
            $prices = [];
            foreach ($data['prices'] as $priceData) {
                $currency = $this->currencyRepository->findOneByCode($priceData['currencyCode']);
                if (!$currency) {
                    $currency = $this->currencySynchronizer->syncOne([
                        'code' => $priceData['currencyCode'],
                    ]);

                    if (!$currency) {
                        throw new \RuntimeException('The currency `'.$priceData['currencyCode'].'` was not found in the local database');
                    }
                }

                $period = null;
                if ($priceData['periodId']) {
                    $period = $this->periodRepository->findOneByExternalId($priceData['periodId']);

                    if (!$period) {
                        $period = $this->periodSynchronizer->syncOne([
                            'externalId' => $priceData['periodId'],
                        ]);

                        if (!$period) {
                            throw new \RuntimeException('The period `'.$priceData['periodId'].'` was not found in the local database');
                        }
                    }
                }

                // we use round() method because Dandomain apparently can have three decimal floats for the specialOfferPrice
                $specialOfferPrice = BigDecimal::of((string) round($priceData['specialOfferPrice'], 2))->multipliedBy(100)->toInt();
                $unitPrice = BigDecimal::of((string) round($priceData['unitPrice'], 2))->multipliedBy(100)->toInt();

                $price = Price::create($priceData['amount'], $priceData['avance'], $priceData['b2BGroupId'], $currency, $specialOfferPrice, $unitPrice);
                $price->setPeriod($period);

                $prices[] = $price;
            }

            $product->updatePrices($prices);
        }

        /*
         * @todo out comment this and fix it
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

        return $product;
    }

    protected function updateCollection(array $originalIdList, array $newIdList, Collection $collection): array
    {
        $idsToRemove = array_diff($originalIdList, $newIdList);
        $idsToAdd = array_diff($newIdList, $originalIdList);
        $entitiesToRemove = [];

        foreach ($collection as $item) {
            if (in_array($item->getExternalId(), $idsToRemove)) {
                $entitiesToRemove[] = $item;
            }
        }

        foreach ($entitiesToRemove as $item) {
            $collection->removeElement($item);
        }

        return $idsToAdd;
    }
}
