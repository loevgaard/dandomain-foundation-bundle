<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

interface RepositoryInterface
{
    public function save($obj);

    /**
     * This will get a reference for the specified id
     *
     * @param $id
     * @return object
     */
    public function getReference($id);
}
