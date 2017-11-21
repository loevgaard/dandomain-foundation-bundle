<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    /**
     * @param string $number
     * @return ProductInterface|null
     */
    public function findOneByProductNumber(string $number): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->getRepository()->findOneBy([
            'number' => $number
        ]);

        return $obj;
    }
}