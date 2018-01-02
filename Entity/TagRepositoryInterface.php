<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;

interface TagRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?TagInterface;
}
