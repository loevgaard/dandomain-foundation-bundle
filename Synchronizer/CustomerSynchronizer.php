<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Manager\SiteManager;
use Loevgaard\DandomainFoundationBundle\Manager\StateManager;
use Loevgaard\DandomainFoundationBundle\Model\Order;

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

    public function syncCustomer($customer, $flush = true)
    {
        if (is_numeric($customer)) {
            $customer = \GuzzleHttp\json_decode($this->api->customer->getCustomer($customer)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $customer->id,
        ]);

        if (!$entity) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($customer->id)
            ->setAddress($customer->address)
            ->setAddress2($customer->address2)
            ->setAttention($customer->attention)
            ->setCity($customer->city)
            ->setCountry($customer->country)
            ->setEan($customer->ean)
            ->setEmail($customer->email)
            ->setFax($customer->fax)
            ->setName($customer->name)
            ->setPhone($customer->phone)
            ->setState($customer->state)
            ->setZipCode($customer->zipCode)
        ;

        $this->objectManager->persist($entity);

        if ($flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
