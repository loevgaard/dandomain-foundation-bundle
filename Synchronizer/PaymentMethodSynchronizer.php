<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\PaymentMethodInterface;

class PaymentMethodSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\PaymentMethod';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\PaymentMethodInterface';

    /**
     * Synchronizes PaymentMethod.
     *
     * @param array $paymentMethod
     * @param bool  $flush
     * @param PaymentMethodInterface  $paymentMethodEntity
     *
     * @return PaymentMethodInterface
     */
    public function syncPaymentMethod($paymentMethod, $flush = true, $paymentMethodEntity = null)
    {
        if (is_numeric($paymentMethod)) {
            $paymentMethod = \GuzzleHttp\json_decode($this->api->settings->getPaymentMethods($paymentMethod)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $paymentMethod->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($paymentMethod->id)
            ->setFee($paymentMethod->fee)
            ->setFeeInclVat($paymentMethod->feeInclVat)
            ->setName($paymentMethod->name)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
