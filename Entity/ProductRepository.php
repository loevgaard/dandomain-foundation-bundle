<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Doctrine\ORM\NoResultException;
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

    /**
     * @param int $externalId
     * @param bool $fetchAll
     * @return ProductInterface|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByExternalId(int $externalId, bool $fetchAll = false) : ?ProductInterface
    {
        if($fetchAll) {
            try {
                // @todo test if this works
                $qb = $this->repository->createQueryBuilder('p');
                $qb->select('p, m, vg')
                    ->leftJoin('p.manufacturers', 'm')
                    ->leftJoin('p.variantGroups', 'vg');
                $qb->where($qb->expr()->eq('p.externalId', $externalId));

                /** @var ProductInterface $obj */
                $obj = $qb->getQuery()->getSingleResult();
            } catch (NoResultException $e) {
                return null;
            }

            return $obj;
        }

        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }
}