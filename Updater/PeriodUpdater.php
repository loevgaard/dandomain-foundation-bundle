<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Entity\Period;
use Loevgaard\DandomainFoundationBundle\Entity\PeriodRepositoryInterface;

class PeriodUpdater implements PeriodUpdaterInterface
{
    /**
     * @var PeriodRepositoryInterface
     */
    protected $periodRepository;

    public function __construct(PeriodRepositoryInterface $periodRepository)
    {
        $this->periodRepository = $periodRepository;
    }

    public function updateFromApiResponse(array $data): PeriodInterface
    {
        $period = $this->periodRepository->findOneByExternalId($data['id']);
        if (!$period) {
            $period = new Period();
            $period->setExternalId($data['id']);
        }

        if ($data['startDate']) {
            $period->setStartDate(DateTimeImmutable::createFromJson($data['startDate']));
        }

        if ($data['endDate']) {
            $period->setEndDate(DateTimeImmutable::createFromJson($data['endDate']));
        }

        $period
            ->setTitle($data['title'])
            ->setDisabled($data['disabled'])
        ;

        return $period;
    }
}
