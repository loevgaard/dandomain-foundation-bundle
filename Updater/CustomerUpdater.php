<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Customer;
use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;
use Loevgaard\DandomainFoundation\Repository\CustomerRepository;

class CustomerUpdater implements CustomerUpdaterInterface
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders.
     *
     * @param array $data
     *
     * @return CustomerInterface
     */
    public function updateFromEmbeddedApiResponse(array $data): CustomerInterface
    {
        // we cast to int because for some reason Dandomain can (sometimes) have customers where the id is not set
        // and instead of setting the id to 0, Dandomain sets it to ''
        $id = (int) $data['id'];

        $customer = $this->customerRepository->findOneByExternalId($id);
        if (!$customer) {
            $customer = new Customer();
            $customer->setExternalId($id);
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
