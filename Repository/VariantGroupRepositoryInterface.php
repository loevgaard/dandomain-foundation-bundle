<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;

interface VariantGroupRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?VariantGroupInterface;
}
