<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function findOneByNumber(int $number) : ?CategoryInterface;
}