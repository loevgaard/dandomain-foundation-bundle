<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;

/**
 * @method null|StateInterface find($id)
 * @method StateInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|StateInterface findOneBy(array $criteria)
 * @method StateInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class StateRepository extends Repository implements StateRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?StateInterface
    {
        /** @var StateInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
