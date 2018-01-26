<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;
use Loevgaard\DandomainFoundation\Repository\PeriodRepository;
use Loevgaard\DandomainFoundationBundle\Updater\PeriodUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeriodSynchronizer extends Synchronizer implements PeriodSynchronizerInterface
{
    /**
     * @var PeriodRepository
     */
    protected $repository;

    /**
     * @var PeriodUpdaterInterface
     */
    protected $periodUpdater;

    public function __construct(PeriodRepository $repository, Api $api, string $logsDir, PeriodUpdaterInterface $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->periodUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): PeriodInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);

        try {
            $this->syncAll();
        } catch (OptimisticLockException $e) {
            return null;
        }

        return $this->repository->findOneByExternalId($options['externalId']);
    }

    /**
     * @param array $options
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $periods = \GuzzleHttp\json_decode((string) $this->api->relatedData->getPeriods()->getBody());
        foreach ($periods as $period) {
            $entity = $this->periodUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($period));
            $this->repository->save($entity);
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['externalId'])
            ->setAllowedTypes('externalId', 'string')
            ->setRequired('externalId')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
