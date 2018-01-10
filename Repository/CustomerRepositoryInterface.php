<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?CustomerInterface;
}
