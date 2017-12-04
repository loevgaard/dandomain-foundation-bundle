<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\ShippingMethod;
use Loevgaard\DandomainFoundationBundle\Entity\PaymentMethodRepositoryInterface;

class PaymentMethodUpdater
{
    /**
     * @var PaymentMethodRepositoryInterface
     */
    protected $paymentMethodRepository;

    public function __construct(PaymentMethodRepositoryInterface $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders
     *
     * @param array $data
     * @param string $currency
     * @return PaymentMethodInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, string $currency) : PaymentMethodInterface
    {
        $paymentMethod = $this->getPaymentMethod($data['id']);

        $paymentMethod
            ->setFee(DandomainFoundation\createMoney((string)$currency, $data['fee']))
            ->setFeeInclVat($data['feeInclVat'])
            ->setName($data['name'])
        ;

        return $paymentMethod;
    }

    private function getPaymentMethod(int $externalId) : PaymentMethodInterface
    {
        $paymentMethod = $this->paymentMethodRepository->findOneByExternalId($externalId);
        if(!$paymentMethod) {
            $paymentMethod = new ShippingMethod();
            $paymentMethod->setExternalId($externalId);
        }

        return $paymentMethod;
    }
}