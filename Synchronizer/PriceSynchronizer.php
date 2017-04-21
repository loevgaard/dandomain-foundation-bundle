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
     * Set PeriodSynchronizer.
     *
     * @param PeriodSynchronizer $periodSynchronizer
     *
     * @return ProductSynchronizer
     */
    public function setPeriodSynchronizer(PeriodSynchronizer $periodSynchronizer)
    {
        $this->periodSynchronizer = $periodSynchronizer;

        return $this;
    }

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
        $entity = new $this->entityClassName();

        $entity
            ->setAmount($price->amount)
            ->setAvance($price->avance)
            ->setB2bGroupId($price->b2BGroupId)
            ->setCurrencyCode($price->currencyCode)
            ->setIsoCode($price->ISOCode)
            ->setSpecialOfferPrice($price->specialOfferPrice)
            ->setUnitPrice($price->unitPrice)
        ;

        if ($price->period) {
            $period = $this->periodSynchronizer->syncPeriod($price->period, true);
            $entity->setPeriod($period);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
