<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductTypeInterface;

/**
 * @method null|ProductTypeInterface find($id)
 * @method ProductTypeInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|ProductTypeInterface findOneBy(array $criteria)
 * @method ProductTypeInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class ProductTypeRepository extends Repository implements ProductTypeRepositoryInterface
{
}
