<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;

interface ManufacturerRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?ManufacturerInterface;
}
