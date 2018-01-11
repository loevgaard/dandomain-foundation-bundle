<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;

/**
 * @method null|ManufacturerInterface find($id)
 * @method ManufacturerInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ManufacturerInterface findOneBy(array $criteria)
 * @method ManufacturerInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class ManufacturerRepository extends Repository implements ManufacturerRepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?ManufacturerInterface
    {
        /** @var ManufacturerInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}