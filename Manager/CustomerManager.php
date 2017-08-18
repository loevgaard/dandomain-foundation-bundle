<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\CustomerInterface;

class CustomerManager extends Manager
{
    /**
     * @return CustomerInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param CustomerInterface $obj
     */
    public function delete(CustomerInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param CustomerInterface $obj The entity
     * @param bool $flush
     */
    public function update(CustomerInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }
}