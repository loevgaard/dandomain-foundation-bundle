<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\DeliveryInterface;

class DeliveryManager extends Manager
{
    /**
     * @return DeliveryInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param DeliveryInterface $obj
     */
    public function delete(DeliveryInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param DeliveryInterface $obj The entity
     * @param bool $flush
     */
    public function update(DeliveryInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }
}