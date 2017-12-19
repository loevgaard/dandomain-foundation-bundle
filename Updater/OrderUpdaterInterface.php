<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

interface OrderUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data): OrderInterface;
}
