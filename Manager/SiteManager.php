<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\SiteInterface;

class SiteManager extends Manager
{
    /**
     * @return SiteInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param SiteInterface $obj
     */
    public function delete(SiteInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param SiteInterface $obj The entity
     * @param bool $flush
     */
    public function update(SiteInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }
}