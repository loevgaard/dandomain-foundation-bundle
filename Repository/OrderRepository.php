<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

/**
 * @method null|OrderInterface find($id)
 * @method OrderInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|OrderInterface findOneBy(array $criteria)
 * @method OrderInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class OrderRepository extends Repository implements OrderRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?OrderInterface
    {
        /** @var OrderInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
