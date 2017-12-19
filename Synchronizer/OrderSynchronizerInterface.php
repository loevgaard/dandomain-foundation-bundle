<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

interface OrderSynchronizerInterface extends SynchronizerInterface
{
    public function syncOne(array $options = []): OrderInterface;
}
