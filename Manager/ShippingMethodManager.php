<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\ShippingMethodInterface;

/**
 * @method ShippingMethodInterface create()
 * @method delete(ShippingMethodInterface $obj)
 * @method update(ShippingMethodInterface $obj, $flush = true)
 */
class ShippingMethodManager extends Manager
{
    /**
     * @param $externalId
     * @param bool $fetch If true, we will try to fetch the shipping method from Dandomain
     * @return ShippingMethodInterface|null
     */
    public function findByExternalId($externalId, $fetch = true) {
        /** @var ShippingMethodInterface $shippingMethod */
        $shippingMethod = $this->getRepository()->findOneBy([
            'externalId' => $externalId
        ]);

        if(!$shippingMethod && $fetch) {
            // @todo fetch from Dandomain
        }

        return $shippingMethod;
    }
}