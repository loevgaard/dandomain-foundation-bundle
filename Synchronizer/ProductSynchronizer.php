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
            'externalId' => $product->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setDisabled($product->disabled ? true : false)
            ->setExternalId($product->id)
            ->setEndDate(\Dandomain\Api\jsonDateToDate($product->endDate))
            ->setStartDate(\Dandomain\Api\jsonDateToDate($product->startDate))
            ->setTitle($product->title)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
