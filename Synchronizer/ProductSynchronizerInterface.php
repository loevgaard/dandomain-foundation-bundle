<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductSynchronizerInterface extends SynchronizerInterface
{
    public function syncOne(array $options = []): ?ProductInterface;
}
