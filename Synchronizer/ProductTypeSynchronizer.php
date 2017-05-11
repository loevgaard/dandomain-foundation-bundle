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
     * @var ProductTypeFormulaSynchronizer
     */
    protected $productTypeFormulaSynchronizer;

    /**
     * @var ProductTypeVatSynchronizer
     */
    protected $productTypeVatSynchronizer;

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
     * Set ProductTypeFormulaSynchronizer.
     *
     * @param ProductTypeFormulaSynchronizer $productTypeFormulaSynchronizer
     *
     * @return ProductTypeSynchronizer
     */
    public function setProductTypeFormulaSynchronizer(ProductTypeFormulaSynchronizer $productTypeFormulaSynchronizer)
    {
        $this->productTypeFormulaSynchronizer = $productTypeFormulaSynchronizer;

        return $this;
    }

    /**
     * Set ProductTypeVatSynchronizer.
     *
     * @param ProductTypeVatSynchronizer $productTypeVatSynchronizer
     *
     * @return ProductTypeSynchronizer
     */
    public function setProductTypeVatSynchronizer(ProductTypeVatSynchronizer $productTypeVatSynchronizer)
    {
        $this->productTypeVatSynchronizer = $productTypeVatSynchronizer;

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

        if (is_array($productType->fields)) {
            foreach ($productType->fields as $fieldTmp) {
                $productTypeField = $this->productTypeFieldSynchronizer->syncProductTypeField($fieldTmp, $flush);
                $entity->addProductTypeField($productTypeField);
            }
        }

        if (is_array($productType->formula)) {
            foreach ($productType->formula as $formulaTmp) {
                $productTypeFormula = $this->productTypeFormulaSynchronizer->syncProductTypeFormula($formulaTmp, $flush);
                $entity->addProductTypeFormula($productTypeFormula);
            }
        }

        if (is_array($productType->vat)) {
            foreach ($productType->vat as $vatTmp) {
                $productTypeVat = $this->productTypeVatSynchronizer->syncProductTypeVat($vatTmp, $flush);
                $entity->addProductTypeVat($productTypeVat);
            }
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
