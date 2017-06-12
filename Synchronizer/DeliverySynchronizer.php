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
     * @param \stdClass         $delivery
     * @param bool              $flush
     * @param DeliveryInterface $deliveryEntity
     *
     * @return DeliveryInterface
     */
    public function syncDelivery($delivery, $flush = true, $deliveryEntity = null)
    {
        if (null === $deliveryEntity) {
            $entity = new $this->entityClassName();
        } else {
            $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                'id' => $deliveryEntity->getId(),
            ]);
        }

        $entity
            ->setAddress($delivery->address ? : null)
            ->setAddress2($delivery->address2 ? : null)
            ->setAttention($delivery->attention ? : null)
            ->setCity($delivery->city ? : null)
            ->setCountry($delivery->country ? : null)
            ->setCountryId($delivery->countryId ? : null)
            ->setCvr($delivery->cvr ? : null)
            ->setEan($delivery->ean ? : null)
            ->setEmail($delivery->email ? : null)
            ->setFax($delivery->fax ? : null)
            ->setName($delivery->name ? : null)
            ->setPhone($delivery->phone ? : null)
            ->setState($delivery->state ? : null)
            ->setZipCode($delivery->zipCode ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
