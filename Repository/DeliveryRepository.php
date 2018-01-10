<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\DeliveryInterface;

/**
 * @method null|DeliveryInterface find($id)
 * @method DeliveryInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|DeliveryInterface findOneBy(array $criteria)
 * @method DeliveryInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class DeliveryRepository extends Repository implements DeliveryRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?DeliveryInterface
    {
        /** @var DeliveryInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
