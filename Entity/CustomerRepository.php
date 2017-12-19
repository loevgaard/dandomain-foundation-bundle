<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;

class CustomerRepository extends Repository implements CustomerRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?CustomerInterface
    {
        /** @var CustomerInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
