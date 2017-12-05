<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Product;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    /**
     * @param string $number
     * @param bool $fetchAll
     * @return ProductInterface|null
     */
    public function findOneByProductNumber(string $number, bool $fetchAll = false): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'number' => $number
        ]);

        return $obj;
    }

    public function findOneByExternalId(int $externalId, bool $fetchAll = false) : ?ProductInterface
    {
        if($fetchAll) {
            // @todo test if this works
            $qb = $this->repository->createQueryBuilder('p');
            $qb->select('p, m, vg')
                ->leftJoin('p.manufacturers', 'm')
                ->leftJoin('p.variantGroups', 'vg')
            ;
            $qb->where($qb->expr()->eq('p.externalId', $externalId));

            /** @var ProductInterface $obj */
            $obj = $qb->getQuery()->getSingleResult();

            return $obj;
        }

        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }
}