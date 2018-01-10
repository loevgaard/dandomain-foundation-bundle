<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function findOneByNumber(string $number): ?CategoryInterface;

    /**
     * @param array $options
     *
     * @return \Generator|CategoryInterface[]
     */
    public function iterator(array $options = []): \Generator;
}
