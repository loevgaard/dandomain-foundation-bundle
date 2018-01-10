<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;

/**
 * @method null|TagValueInterface find($id)
 * @method TagValueInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|TagValueInterface findOneBy(array $criteria)
 * @method TagValueInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class TagValueRepository extends Repository implements TagValueRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?TagValueInterface
    {
        /** @var TagValueInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
