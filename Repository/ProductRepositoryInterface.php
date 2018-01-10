<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId, bool $fetchAll = false): ?ProductInterface;

    public function findOneByProductNumber(string $number, bool $fetchAll = false): ?ProductInterface;

    /**
     * Will update the parent child relationships between all products.
     *
     * @param array $productIds The product ids to update. If empty, it will update ALL
     */
    public function updateParentChildRelationships(array $productIds = []);

    /**
     * Soft deletes product that are
     * - in the $in array
     * - and not in the $notIn array.
     *
     * If the $in array is empty, it will delete ALL products that are not in the $notIn array
     * If both arrays are empty it will do nothing
     *
     * @param array $in
     * @param array $notIn
     */
    public function removeBulk(array $in = [], array $notIn = []);
}
