<?php
namespace Loevgaard\DandomainFoundation\Manager;

use Loevgaard\DandomainFoundation\Model\Site;

class StateManager extends Manager implements StateManagerInterface
{
    /**
     * Notice this is the Dandomain site id, not the database incremental id, use the find() method for that
     *
     * @param int $id
     * @return Site
     */
    public function findStateByExternalId($id)
    {
        return $this->getEntityManager()->getRepository('Loevgaard\\DandomainFoundation\\Model\\State')->findOneBy([
            'externalId' => $id
        ]);
    }
}