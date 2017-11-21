<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function findOneByProductNumber(string $number) : ?ProductInterface;
}