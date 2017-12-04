<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;

class OrderRepository extends Repository implements OrderRepositoryInterface
{
    public function findOneByExternalId(int $externalId) : ?OrderInterface
    {
        /** @var OrderInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }
}