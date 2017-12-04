<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

interface PaymentMethodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId) : ?PaymentMethodInterface;
}