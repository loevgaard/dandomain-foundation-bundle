<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;

interface ShippingMethodUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data, string $currency): ShippingMethodInterface;

    public function updateFromEmbeddedApiResponse(array $data, string $currency, ShippingMethodInterface $shippingMethod = null): ShippingMethodInterface;
}
