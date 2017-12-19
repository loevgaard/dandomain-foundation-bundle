<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

class PaymentMethodRepository extends Repository implements PaymentMethodRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?PaymentMethodInterface
    {
        /** @var PaymentMethodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
