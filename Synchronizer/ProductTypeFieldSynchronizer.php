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
     * @param array $productTypeField
     * @param bool  $flush
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
            ->setExternalId($productTypeField->id)
            ->setLabel($productTypeField->label)
            ->setLanguageId($productTypeField->languageId)
            ->setNumber($productTypeField->number)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
