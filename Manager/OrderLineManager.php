<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\OrderLineInterface;

class OrderLineManager extends Manager
{
    /**
     * @return OrderLineInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param OrderLineInterface $obj
     */
    public function delete(OrderLineInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param OrderLineInterface $obj The entity
     * @param bool $flush
     */
    public function update(OrderLineInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }
}