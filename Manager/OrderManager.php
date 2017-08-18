<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;

class OrderManager extends Manager
{
    /**
     * @return OrderInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param OrderInterface $obj
     */
    public function delete(OrderInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param OrderInterface $obj The entity
     * @param bool $flush
     */
    public function update(OrderInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }
}