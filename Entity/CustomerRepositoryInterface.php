<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId) : ?CustomerInterface;
}