<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;

interface ManufacturerRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?ManufacturerInterface;
}
