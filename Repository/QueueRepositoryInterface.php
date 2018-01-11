<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;

/**
 * @method null|QueueItemInterface find($id)
 * @method QueueItemInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|QueueItemInterface findOneBy(array $criteria)
 * @method QueueItemInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
interface QueueRepositoryInterface extends RepositoryInterface
{
}
