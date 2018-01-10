<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;

interface PeriodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?PeriodInterface;
}
