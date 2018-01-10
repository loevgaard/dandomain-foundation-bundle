<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;

interface StateRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?StateInterface;
}
