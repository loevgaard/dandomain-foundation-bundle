<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Entity\Customer;
use Loevgaard\DandomainFoundationBundle\Entity\CustomerRepositoryInterface;

class CustomerUpdater implements CustomerUpdaterInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders
     *
     * @param array $data
     * @return CustomerInterface
     */
    public function updateFromEmbeddedApiResponse(array $data) : CustomerInterface
    {
        $customer = $this->customerRepository->findOneByExternalId($data['id']);
        if(!$customer) {
            $customer = new Customer();
            $customer->setExternalId($data['id']);
        }

        $customer
            ->setAddress($data['address'])
            ->setAddress2($data['address2'])
            ->setAttention($data['attention'])
            ->setCity($data['city'])
            ->setCountry($data['country'])
            ->setCountryId($data['countryId'])
            ->setEan($data['ean'])
            ->setEmail($data['email'])
            ->setFax($data['fax'])
            ->setName($data['name'])
            ->setPhone($data['phone'])
            ->setState($data['state'])
            ->setZipCode($data['zipCode'])
        ;

        return $customer;
    }
}