<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ShippingMethodInterface;

class ShippingMethodSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ShippingMethod';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ShippingMethodInterface';

    /**
     * Synchronizes ShippingMethod.
     *
     * @param \stdClass $shippingMethod
     * @param bool      $flush
     *
     * @return ShippingMethodInterface
     */
    public function syncShippingMethod($shippingMethod, $flush = true)
    {
        if (is_numeric($shippingMethod)) {
            $shippingMethod = \GuzzleHttp\json_decode($this->api->settings->getShippingMethods($shippingMethod)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $shippingMethod->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($shippingMethod->id ? : null)
            ->setFee($shippingMethod->fee ? : null)
            ->setFeeInclVat($shippingMethod->feeInclVat ? : null)
            ->setName($shippingMethod->name ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
