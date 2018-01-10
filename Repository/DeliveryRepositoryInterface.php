<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

interface DeliveryRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?DeliveryInterface;
}
