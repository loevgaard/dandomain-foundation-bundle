<?php

namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\Site;

class StateManager extends Manager implements StateManagerInterface
{
    /**
     * Notice this is the Dandomain site id, not the database incremental id, use the find() method for that.
     *
     * @param int $id
     *
     * @return Site
     */
    public function findStateByExternalId($id)
    {
        return $this->getEntityManager()->getRepository('Loevgaard\\DandomainFoundationBundle\\Model\\State')->findOneBy([
            'externalId' => $id,
        ]);
    }
}
