<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;

class SiteRepository extends Repository implements SiteRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?SiteInterface
    {
        /** @var SiteInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
