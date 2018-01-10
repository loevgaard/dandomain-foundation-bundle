<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;

interface TagValueRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?TagValueInterface;
}
