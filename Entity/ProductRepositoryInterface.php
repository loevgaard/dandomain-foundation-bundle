<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId, bool $fetchAll = false) : ?ProductInterface;
    public function findOneByProductNumber(string $number, bool $fetchAll = false) : ?ProductInterface;
}