<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;

/**
 * @method null|CustomerInterface find($id)
 * @method CustomerInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|CustomerInterface findOneBy(array $criteria)
 * @method CustomerInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class CustomerRepository extends Repository implements CustomerRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?CustomerInterface
    {
        /** @var CustomerInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
