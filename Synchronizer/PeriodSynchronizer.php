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

        if ($period->endDate) {
            $endDate = \Dandomain\Api\jsonDateToDate($period->endDate);
            $endDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $endDate = null;
        }

        if ($period->startDate) {
            $startDate = \Dandomain\Api\jsonDateToDate($period->startDate);
            $startDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $startDate = null;
        }

        $entity
            ->setDisabled($period->disabled ? true : false)
            ->setExternalId($period->id)
        ;

        if (is_string($period->title)) {
            $entity->setTitle($period->title);
        }

        if (null !== $endDate) {
            $entity->setEndDate($endDate);
        }

        if (null !== $startDate) {
            $entity->setStartDate($startDate);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
