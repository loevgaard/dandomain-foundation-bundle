<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductTypeFieldInterface;

class ProductTypeFieldSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeField';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeFieldInterface';

    /**
     * Synchronizes ProductTypeField.
     *
     * @param \stdClass $productTypeField
     * @param bool      $flush
     *
     * @return ProductTypeFieldInterface
     */
    public function syncProductTypeField($productTypeField, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $productTypeField->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($productTypeField->id ? : null)
            ->setLabel($productTypeField->label ? : null)
            ->setLanguageId($productTypeField->languageId ? : null)
            ->setNumber($productTypeField->number ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
