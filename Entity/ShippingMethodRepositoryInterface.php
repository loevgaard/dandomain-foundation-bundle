<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;

interface ShippingMethodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?ShippingMethodInterface;
}
