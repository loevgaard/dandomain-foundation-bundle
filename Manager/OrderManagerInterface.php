<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;

interface OrderManagerInterface
{
    /**
     * @return OrderInterface
     */
    public function create();

    /**
     * @param OrderInterface $obj
     */
    public function delete(OrderInterface $obj);

    /**
     * @param OrderInterface $obj The entity
     * @param bool $flush
     */
    public function update(OrderInterface $obj, $flush = true);
}
