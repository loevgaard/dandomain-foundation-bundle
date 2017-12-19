<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;

interface SiteRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?SiteInterface;
}
