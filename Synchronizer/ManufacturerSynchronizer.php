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
     * @param \stdClass $manufacturer
     * @param bool      $flush
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
            ->setExternalId($manufacturer->id ? : null)
            ->setLink($manufacturer->link ? : null)
            ->setLinkText($manufacturer->linkText ? : null)
            ->setName($manufacturer->name ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
