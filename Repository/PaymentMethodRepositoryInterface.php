<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

interface PaymentMethodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?PaymentMethodInterface;
}
