<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PaymentMethodInterface;

/**
 * @method null|PaymentMethodInterface find($id)
 * @method PaymentMethodInterface[] findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
 * @method null|PaymentMethodInterface findOneBy(array $criteria)
 * @method PaymentMethodInterface[] findAll()
 * @method persist($object)
 * @method flush()
 * @method clear()
 * @method remove($object)
 */
class PaymentMethodRepository extends Repository implements PaymentMethodRepositoryInterface
{
    public function findOneByExternalId(int $externalId): ?PaymentMethodInterface
    {
        /** @var PaymentMethodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }
}
