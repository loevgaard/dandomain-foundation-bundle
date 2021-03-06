<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Delivery;
use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

class DeliveryUpdater implements DeliveryUpdaterInterface
{
    /**
     * This method is called when a delivery object is embedded in another object, i.e. orders.
     *
     * @param array                  $data
     * @param DeliveryInterface|null $delivery
     *
     * @return DeliveryInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, DeliveryInterface $delivery = null): DeliveryInterface
    {
        if (!$delivery) {
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
