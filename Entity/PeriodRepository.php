<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;

class PeriodRepository extends Repository implements PeriodRepositoryInterface
{
    public function findOneByExternalId(string $externalId) : ?PeriodInterface
    {
        /** @var PeriodInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }
}