<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;

interface PeriodRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(string $externalId) : ?PeriodInterface;
}