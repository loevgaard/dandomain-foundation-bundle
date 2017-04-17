<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\PriceInterface;

class PriceSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Price';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\PriceInterface';

    /**
     * Synchronizes Price.
     *
     * @param array $price
     * @param bool  $flush
     *
     * @return PriceInterface
     */
    public function syncPrice($price, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $price->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setDisabled($price->disabled ? true : false)
            ->setExternalId($price->id)
            ->setEndDate(\Dandomain\Api\jsonDateToDate($price->endDate))
            ->setStartDate(\Dandomain\Api\jsonDateToDate($price->startDate))
            ->setTitle($price->title)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
