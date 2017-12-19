<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;

class ManufacturerRepository extends Repository implements ManufacturerRepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?ManufacturerInterface
    {
        /** @var ManufacturerInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
