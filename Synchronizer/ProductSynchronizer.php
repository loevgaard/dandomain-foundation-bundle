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

        if ($order->created) {
            $created = \Dandomain\Api\jsonDateToDate($order->modifiedDate);
            $created->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $created = null;
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
        ;

        if (null !== $created) {
            $entity->setCreated($created);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
