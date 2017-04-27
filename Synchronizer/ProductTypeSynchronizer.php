<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductTypeInterface;

class ProductTypeSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductType';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeInterface';

    /**
     * @var ProductTypeFieldSynchronizer
     */
    protected $productTypeFieldSynchronizer;

    /**
     * Set ProductTypeFieldSynchronizer.
     *
     * @param ProductTypeFieldSynchronizer $productTypeFieldSynchronizer
     *
     * @return ProductTypeSynchronizer
     */
    public function setProductTypeFieldSynchronizer(ProductTypeFieldSynchronizer $productTypeFieldSynchronizer)
    {
        $this->productTypeFieldSynchronizer = $productTypeFieldSynchronizer;

        return $this;
    }

    /**
     * Synchronizes ProductType.
     *
     * @param array $productType
     * @param bool  $flush
     *
     * @return ProductTypeInterface
     */
    public function syncProductType($productType, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $productType->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($productType->id)
            ->setName($productType->name)
        ;

        if (is_array($product->fields)) {
            foreach ($product->fields as $fieldTmp) {
                $productTypeField = $this->productTypeFieldSynchronizer->syncProductTypeField($fieldTmp, $flush);
                $entity->addProductTypeField($productTypeField);
            }
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
