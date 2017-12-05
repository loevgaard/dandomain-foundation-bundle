<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\PeriodUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeriodSynchronizer extends Synchronizer implements PeriodSynchronizerInterface
{
    /**
     * @var PeriodUpdaterInterface
     */
    protected $periodUpdater;

    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir, PeriodUpdaterInterface $periodUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->periodUpdater = $periodUpdater;
    }

    public function syncOne(array $options = []) : DandomainFoundation\Entity\Generated\PeriodInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    public function syncAll(array $options = [])
    {
        $periods = \GuzzleHttp\json_decode((string)$this->api->relatedData->getPeriods()->getBody());
        foreach ($periods as $period) {
            $entity = $this->periodUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($period));
            $this->repository->save($entity);
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
