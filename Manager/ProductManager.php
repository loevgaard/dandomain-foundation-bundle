<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\ProductInterface;

/**
 * @method ProductInterface create()
 * @method delete(ProductInterface $obj)
 * @method update(ProductInterface $obj, $flush = true)
 */
class ProductManager extends Manager
{
    /**
     * @param $productNumber
     * @param bool $fetch If true, we will try to fetch the shipping method from Dandomain
     * @return ProductInterface|null
     */
    public function findByProductNumber($productNumber, $fetch = true) {
        /** @var ProductInterface $product */
        $product = $this->getRepository()->findOneBy([
            'number' => $productNumber
        ]);

        if(!$product && $fetch) {
            // @todo fetch from Dandomain
        }

        return $product;
    }
}