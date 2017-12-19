<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function findOneByExternalId(int $externalId, bool $fetchAll = false) : ?ProductInterface;
    public function findOneByProductNumber(string $number, bool $fetchAll = false) : ?ProductInterface;

    /**
     * Will update the parent child relationships between all products
     *
     * @param array $productIds The product ids to update. If empty, it will update ALL
     * @return void
     */
    public function updateParentChildRelationships(array $productIds = []);
}