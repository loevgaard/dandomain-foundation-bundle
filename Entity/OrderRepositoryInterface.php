<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

interface OrderRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?OrderInterface;
}
