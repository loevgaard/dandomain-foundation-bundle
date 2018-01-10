<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;

interface TagRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?TagInterface;
}
