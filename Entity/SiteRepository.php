<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;

/**
 * @method null|SiteInterface find($id)
 * @method SiteInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|SiteInterface findOneBy(array $criteria)
 * @method SiteInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class SiteRepository extends Repository implements SiteRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?SiteInterface
    {
        /** @var SiteInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
