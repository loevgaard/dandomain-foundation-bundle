<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Doctrine\ORM\NoResultException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\UnexpectedResultException;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Product;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    /**
     * @param string $number
     * @param bool   $fetchAll
     *
     * @return ProductInterface|null
     */
    public function findOneByProductNumber(string $number, bool $fetchAll = false): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'number' => $number,
        ]);

        return $obj;
    }

    /**
     * @param int  $externalId
     * @param bool $fetchAll
     *
     * @return ProductInterface|null
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByExternalId(int $externalId, bool $fetchAll = false): ?ProductInterface
    {
        if ($fetchAll) {
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
            'externalId' => $externalId,
        ]);

        return $obj;
    }

    public function updateParentChildRelationships(array $productIds = [])
    {
        $variantMasterIdCache = [];

        $innerQb = $this->repository->createQueryBuilder('p');
        $innerQb->where('p.isVariantMaster = 1')
            ->andWhere('p.number = :number');

        $qb = $this->repository->createQueryBuilder('p');
        $qb
            ->where('p.isVariantMaster = 0')
            ->andWhere('p.variantMasterId is not null')
        ;

        if (count($productIds)) {
            $qb->andWhere($qb->expr()->in('p.id', ':productIds'));
            $qb->setParameter('productIds', $productIds);
        }

        $batchSize = 50;
        $i = 1;

        $iterableResult = $qb->getQuery()->iterate();
        foreach ($iterableResult as $row) {
            /** @var ProductInterface $product */
            $product = $row[0];

            if (!isset($variantMasterIdCache[$product->getVariantMasterId()])) {
                try {
                    /** @var ProductInterface $parent */
                    $parent = $innerQb->setParameter('number',
                        $product->getVariantMasterId())->getQuery()->getSingleResult();
                    $parent = $parent->getId();
                } catch (UnexpectedResultException $e) {
                    $parent = null;
                }

                $variantMasterIdCache[$product->getVariantMasterId()] = $parent;
            }

            $ref = $variantMasterIdCache[$product->getVariantMasterId()];
            if ($ref) {
                try {
                    $ref = $this->manager->getReference(Product::class, $ref);
                } catch (ORMException $e) {
                    $ref = null;
                }
            }

            $product->setParent($ref);

            if (0 === ($i % $batchSize)) {
                $this->manager->flush();
                $this->manager->clear();
            }

            ++$i;
        }

        $this->manager->flush();
    }

    public function bulkRemove(array $in = [], array $notIn = [])
    {
        if (!count($in) && !count($notIn)) {
            return;
        }

        $qb = $this->repository->createQueryBuilder('p');

        $qb->update()->set('p.deletedAt', ':date')->setParameter('date', new DateTimeImmutable());

        if (count($in)) {
            $qb->andWhere($qb->expr()->in('p.id', ':inIds'));
            $qb->setParameter('inIds', $in);
        }

        if (count($notIn)) {
            $qb->andWhere($qb->expr()->notIn('p.id', ':notInIds'));
            $qb->setParameter('notInIds', $notIn);
        }

        $qb->getQuery()->execute();
    }
}
