<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;
use Loevgaard\DandomainFoundation\Entity\PaymentMethod;
use Loevgaard\DandomainFoundationBundle\Repository\PaymentMethodRepositoryInterface;

class PaymentMethodUpdater implements PaymentMethodUpdaterInterface
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
            $paymentMethod = $this->paymentMethodRepository->findOneByExternalId($data['id']);

            if (!$paymentMethod) {
                $paymentMethod = new PaymentMethod();
                $paymentMethod->setExternalId($data['id']);
            }
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
}
