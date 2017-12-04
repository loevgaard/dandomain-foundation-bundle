<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;

class StateRepository extends Repository implements StateRepositoryInterface
{
    public function findOneByExternalId(int $externalId) : ?StateInterface
    {
        /** @var StateInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }
}