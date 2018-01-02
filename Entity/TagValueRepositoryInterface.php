<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;

interface TagValueRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?TagValueInterface;
}
