<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

interface DeliveryRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?DeliveryInterface;
}
