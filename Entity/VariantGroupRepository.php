<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;

class VariantGroupRepository extends Repository implements VariantGroupRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?VariantGroupInterface
    {
        /** @var VariantGroupInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
