<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;
use Loevgaard\DandomainFoundation\Entity\ShippingMethod;
use Loevgaard\DandomainFoundationBundle\Entity\ShippingMethodRepositoryInterface;

class ShippingMethodUpdater implements ShippingMethodUpdaterInterface
{
    /**
     * @var ShippingMethodRepositoryInterface
     */
    protected $shippingMethodRepository;

    public function __construct(ShippingMethodRepositoryInterface $shippingMethodRepository)
    {
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    public function updateFromApiResponse(array $data, string $currency) : ShippingMethodInterface
    {
        $shippingMethod = $this->getShippingMethod($data['id']);

        $shippingMethod
            ->setFeeInclVat($data['feeVat'])
            ->setName($data['name'])
        ;

        return $shippingMethod;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders
     *
     * @param array $data
     * @param string $currency
     * @param ShippingMethodInterface $shippingMethod
     * @return ShippingMethodInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, string $currency, ShippingMethodInterface $shippingMethod = null) : ShippingMethodInterface
    {
        if(!$shippingMethod) {
            $shippingMethod = $this->getShippingMethod($data['id']);
        }

        if(!$shippingMethod->getId()) {
            // only update when we create a new entity because this is the embedded method
            $shippingMethod
                ->setFee(DandomainFoundation\createMoney((string)$currency, $data['fee']))
                ->setFeeInclVat($data['feeInclVat'])
                ->setName($data['name']);
        }

        return $shippingMethod;
    }

    private function getShippingMethod(int $externalId) : ShippingMethodInterface
    {
        $shippingMethod = $this->shippingMethodRepository->findOneByExternalId($externalId);
        if(!$shippingMethod) {
            $shippingMethod = new ShippingMethod();
            $shippingMethod->setExternalId($externalId);
        }

        return $shippingMethod;
    }
}