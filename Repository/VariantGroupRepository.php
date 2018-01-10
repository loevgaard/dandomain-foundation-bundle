<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\VariantGroupInterface;

/**
 * @method null|VariantGroupInterface find($id)
 * @method VariantGroupInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|VariantGroupInterface findOneBy(array $criteria)
 * @method VariantGroupInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class VariantGroupRepository extends Repository implements VariantGroupRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?VariantGroupInterface
    {
        /** @var VariantGroupInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
