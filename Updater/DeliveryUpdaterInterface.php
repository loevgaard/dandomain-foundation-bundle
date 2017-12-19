<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

interface DeliveryUpdaterInterface extends UpdaterInterface
{
    public function updateFromEmbeddedApiResponse(array $data, DeliveryInterface $delivery = null): DeliveryInterface;
}
