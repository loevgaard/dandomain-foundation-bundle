<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\ShippingMethodInterface;

class ShippingMethodManager extends Manager
{
    /**
     * @return ShippingMethodInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param ShippingMethodInterface $obj
     */
    public function delete(ShippingMethodInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param ShippingMethodInterface $obj The entity
     * @param bool $flush
     */
    public function update(ShippingMethodInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }

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