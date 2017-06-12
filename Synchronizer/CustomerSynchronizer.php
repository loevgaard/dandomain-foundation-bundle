<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\CustomerInterface;

class CustomerSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Customer';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\CustomerInterface';

    /**
     * Synchronizes Customer.
     *
     * @param array $customer
     * @param bool  $flush
     *
     * @return CustomerInterface
     */
    public function syncCustomer($customer, $flush = true)
    {
        if (is_numeric($customer)) {
            $customer = \GuzzleHttp\json_decode($this->api->customer->getCustomer($customer)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $customer->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($customer->id ? : null)
            ->setAddress($customer->address ? : null)
            ->setAddress2($customer->address2 ? : null)
            ->setAttention($customer->attention ? : null)
            ->setCity($customer->city ? : null)
            ->setCountry($customer->country ? : null)
            ->setEan($customer->ean ? : null)
            ->setEmail($customer->email ? : null)
            ->setFax($customer->fax ? : null)
            ->setName($customer->name ? : null)
            ->setPhone($customer->phone ? : null)
            ->setState($customer->state ? : null)
            ->setZipCode($customer->zipCode ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
