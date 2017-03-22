<?php

namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\Site;

class SiteManager extends Manager implements SiteManagerInterface
{
    /**
     * Notice this is the Dandomain site id, not the database incremental id, use the find() method for that.
     *
     * @param int $id
     *
     * @return Site
     */
    public function findSiteByExternalId($id)
    {
        return $this->getEntityManager()->getRepository('Loevgaard\\DandomainFoundationBundle\\Model\\Site')->findOneBy([
            'externalId' => $id,
        ]);
    }
}
