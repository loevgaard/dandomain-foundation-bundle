<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\StateInterface;

class StateSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\State';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\StateInterface';

    /**
     * Synchronizes State.
     *
     * @param array $state
     * @param bool  $flush
     *
     * @return StateInterface
     */
    public function syncState($state, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $state->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($state->id)
            ->setExclStatistics($state->exclStatistics)
            ->setIsDefault($state->isDefault)
            ->setName($state->name)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
