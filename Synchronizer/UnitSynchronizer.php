<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\UnitInterface;

class UnitSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Unit';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\UnitInterface';

    /**
     * Synchronizes Unit.
     *
     * @param \stdClass $unit
     * @param bool      $flush
     *
     * @return UnitInterface
     */
    public function syncUnit($unit, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $unit->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($unit->id ?: null)
            ->setText($unit->text ?: null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
