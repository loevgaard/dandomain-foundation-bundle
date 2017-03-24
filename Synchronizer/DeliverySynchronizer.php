<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\DeliveryInterface;

class DeliverySynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Delivery';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\DeliveryInterface';

    /**
     * Synchronizes Delivery.
     *
     * @param array $delivery
     * @param bool  $flush
     *
     * @return DeliveryInterface
     */
    public function syncDelivery($delivery, $flush = true)
    {
        $entity = new $this->entityClassName();

        $entity
            ->setAddress($delivery->address)
            ->setAddress2($delivery->address2)
            ->setAttention($delivery->attention)
            ->setCity($delivery->city)
            ->setCountry($delivery->country)
            ->setCountryId($delivery->countryId)
            ->setCvr($delivery->cvr)
            ->setEan($delivery->ean)
            ->setEmail($delivery->email)
            ->setFax($delivery->fax)
            ->setName($delivery->name)
            ->setPhone($delivery->phone)
            ->setState($delivery->state)
            ->setZipCode($delivery->zipCode)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
