<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;
use Loevgaard\DandomainFoundation\Entity\Delivery;
use Loevgaard\DandomainFoundationBundle\Entity\DeliveryRepositoryInterface;

class DeliveryUpdater
{
    /**
     * @var DeliveryRepositoryInterface
     */
    protected $deliveryRepository;

    public function __construct(DeliveryRepositoryInterface $deliveryRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders
     *
     * @param array $data
     * @param DeliveryInterface|null $delivery
     * @return DeliveryInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, DeliveryInterface $delivery = null) : DeliveryInterface
    {
        if(!$delivery) {
            $delivery = new Delivery();
        }

        $delivery
            ->setAddress($data['address'])
            ->setAddress2($data['address2'])
            ->setAttention($data['attention'])
            ->setCity($data['city'])
            ->setCountry($data['country'])
            ->setCountryId($data['countryId'])
            ->setCvr($data['cvr'])
            ->setEan($data['ean'])
            ->setEmail($data['email'])
            ->setFax($data['fax'])
            ->setName($data['name'])
            ->setPhone($data['phone'])
            ->setState($data['state'])
            ->setZipCode($data['zipCode'])
        ;

        return $delivery;
    }
}