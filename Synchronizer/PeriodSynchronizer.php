<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\PeriodInterface;

class PeriodSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Period';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\PeriodInterface';

    /**
     * Synchronizes Period.
     *
     * @param array $period
     * @param bool  $flush
     *
     * @return PeriodInterface
     */
    public function syncPeriod($period, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $period->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setDisabled($period->disabled ? true : false)
            ->setExternalId($period->id)
            ->setEndDate(\Dandomain\Api\jsonDateToDate($period->endDate))
            ->setStartDate(\Dandomain\Api\jsonDateToDate($period->startDate))
            ->setTitle($period->title)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
