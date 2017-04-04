<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ManufacturerInterface;

class ManufacturerSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Manufacturer';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ManufacturerInterface';

    /**
     * Synchronizes Manufacturer.
     *
     * @param array $manufacturer
     * @param bool  $flush
     *
     * @return ManufacturerInterface
     */
    public function syncManufacturer($manufacturer, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $manufacturer->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($manufacturer->id)
            ->setLink($manufacturer->link)
            ->setLinkText($manufacturer->linkText)
            ->setName($manufacturer->name)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
