<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductRelationInterface;

class ProductRelationSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductRelation';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductRelationInterface';

    /**
     * Synchronizes ProductRelation.
     *
     * @param array $productRelation
     * @param bool  $flush
     *
     * @return ProductRelationInterface
     */
    public function syncProductRelation($productRelation, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'productNumber' => $productRelation->productNumber,
            'relatedType' => $productRelation->relatedType,
            'sortOrder' => $productRelation->sortOrder,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setProductNumber($productRelation->productNumber)
            ->setRelatedType($productRelation->relatedType)
            ->setSortOrder($productRelation->sortOrder)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
