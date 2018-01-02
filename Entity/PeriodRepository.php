<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;

/**
 * @method null|PeriodInterface find($id)
 * @method PeriodInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|PeriodInterface findOneBy(array $criteria)
 * @method PeriodInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class PeriodRepository extends Repository implements PeriodRepositoryInterface
{
    public function findOneByExternalId(string $externalId): ?PeriodInterface
    {
        /** @var PeriodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
