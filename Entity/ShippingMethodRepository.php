<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;

class ShippingMethodRepository extends Repository implements ShippingMethodRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?ShippingMethodInterface
    {
        /** @var ShippingMethodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
