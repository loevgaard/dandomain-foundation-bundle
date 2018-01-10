<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\ShippingMethodInterface;

/**
 * @method null|ShippingMethodInterface find($id)
 * @method ShippingMethodInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ShippingMethodInterface findOneBy(array $criteria)
 * @method ShippingMethodInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class ShippingMethodRepository extends Repository implements ShippingMethodRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?ShippingMethodInterface
    {
        /** @var ShippingMethodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
