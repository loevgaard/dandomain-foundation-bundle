<?php

namespace Loevgaard\DandomainFoundationBundle\Repository;

use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface;

/**
 * @method null|InvoiceInterface find($id)
 * @method InvoiceInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|InvoiceInterface findOneBy(array $criteria)
 * @method InvoiceInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class InvoiceRepository extends Repository implements InvoiceRepositoryInterface
{
}
