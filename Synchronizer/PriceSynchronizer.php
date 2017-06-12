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
     * @var PeriodSynchronizer
     */
    protected $periodSynchronizer;

    /**
     * @param PeriodSynchronizer $periodSynchronizer
     *
     * @return $this
     */
    public function setPeriodSynchronizer(PeriodSynchronizer $periodSynchronizer)
    {
        $this->periodSynchronizer = $periodSynchronizer;

        return $this;
    }

    /**
     * Synchronizes Price.
     *
     * @param \stdClass $price
     * @param bool      $flush
     *
     * @return PriceInterface
     */
    public function syncPrice($price, $flush = true)
    {
        /** @var PriceInterface $entity */
        $entity = new $this->entityClassName();

        $entity
            ->setAmount($price->amount ? : null)
            ->setAvance($price->avance ? : null)
            ->setB2bGroupId($price->b2BGroupId ? : null)
            ->setCurrencyCode($price->currencyCode ? : null)
            ->setIsoCode($price->ISOCode ? : null)
            ->setSpecialOfferPrice($price->specialOfferPrice ? : null)
            ->setUnitPrice($price->unitPrice ? : null)
        ;

        if ($price->period) {
            $period = $this->periodSynchronizer->syncPeriod($price->period, $flush);
            $entity->setPeriod($period);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
