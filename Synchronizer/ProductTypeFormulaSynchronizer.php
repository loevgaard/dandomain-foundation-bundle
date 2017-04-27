<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductTypeFormulaInterface;

class ProductTypeFormulaSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeFormula';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeFormulaInterface';

    /**
     * Synchronizes ProductTypeFormula.
     *
     * @param array $productTypeFormula
     * @param bool  $flush
     *
     * @return ProductTypeFormulaInterface
     */
    public function syncProductTypeFormula($productTypeFormula, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $productTypeFormula->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($productTypeFormula->id)
            ->setFormula($productTypeFormula->formula)
            ->setProductTypeGroupId($productTypeFormula->productTypeGroupId)
            ->setSiteId($productTypeFormula->siteId)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
