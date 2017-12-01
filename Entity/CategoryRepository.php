<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function findOneByNumber(int $number) : ?CategoryInterface
    {
        /** @var CategoryInterface $obj */
        $obj = $this->repository->findOneBy([
            'number' => $number
        ]);

        return $obj;
    }
}