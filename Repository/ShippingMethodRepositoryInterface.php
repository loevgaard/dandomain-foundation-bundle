<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;

interface ShippingMethodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?ShippingMethodInterface;
}
