<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;

interface VariantGroupRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId) : ?VariantGroupInterface;
}