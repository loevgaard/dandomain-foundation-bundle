<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

interface PaymentMethodUpdaterInterface extends UpdaterInterface
{
    public function updateFromEmbeddedApiResponse(array $data, string $currency, PaymentMethodInterface $paymentMethod = null) : PaymentMethodInterface;
}