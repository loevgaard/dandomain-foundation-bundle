<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

/**
 * This entity repository is implemented using the principles described here:
 * https://www.tomasvotruba.cz/blog/2017/10/16/how-to-use-repository-with-doctrine-as-service-in-symfony/.
 *
 * @todo this class should probably be in a separate library
 *
 * @method null|object find($id)
 * @method array findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|object findOneBy(array $criteria)
 * @method array findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
interface RepositoryInterface
{
    public function save($obj);

    /**
     * This will get a reference for the specified id.
     *
     * @param $id
     *
     * @return object
     */
    public function getReference($id);

    /**
     * This will clear all entities in the manager, not only the the entity associated with this repository.
     */
    public function clearAll();
}
