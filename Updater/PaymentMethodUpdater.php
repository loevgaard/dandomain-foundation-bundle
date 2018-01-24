<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\PaymentMethod;
use Loevgaard\DandomainFoundation\Repository\PaymentMethodRepository;

class PaymentMethodUpdater implements PaymentMethodUpdaterInterface
{
    /**
     * @var PaymentMethodRepository
     */
    protected $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function updateFromApiResponse(array $data, string $currency): PaymentMethodInterface
    {
        $paymentMethod = $this->getPaymentMethod($data['id']);
        $paymentMethod
            ->setFee(DandomainFoundation\createMoney($currency, $data['fee']))
            ->setFeeInclVat($data['feeVat'])
            ->setName($data['name']);

        return $paymentMethod;
    }

    /**
     * This method is called when an payment method is embedded in another object, i.e. orders.
     *
     * @param array                  $data
     * @param string                 $currency
     * @param PaymentMethodInterface $paymentMethod
     *
     * @return PaymentMethodInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, string $currency, PaymentMethodInterface $paymentMethod = null): PaymentMethodInterface
    {
        if (!$paymentMethod) {
            $paymentMethod = $this->getPaymentMethod($data['id']);
        }

        if (!$paymentMethod->getId()) {
            // only update when we create a new entity because this is the embedded method
            $paymentMethod
                ->setFee(DandomainFoundation\createMoney((string) $currency, $data['fee']))
                ->setFeeInclVat($data['feeInclVat'])
                ->setName($data['name']);
        }

        return $paymentMethod;
    }

    protected function getPaymentMethod(int $externalId) : PaymentMethodInterface
    {
        $paymentMethod = $this->paymentMethodRepository->findOneByExternalId($externalId);

        if (!$paymentMethod) {
            $paymentMethod = new PaymentMethod();
            $paymentMethod->setExternalId($externalId);
        }

        return $paymentMethod;
    }
}
