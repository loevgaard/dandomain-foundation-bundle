<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

class DeliveryRepository extends Repository implements DeliveryRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?DeliveryInterface
    {
        /** @var DeliveryInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
