<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;
use Loevgaard\DandomainFoundation\Repository\StateRepository;
use Loevgaard\DandomainFoundationBundle\Updater\StateUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateSynchronizer extends Synchronizer implements StateSynchronizerInterface
{
    /**
     * @var StateRepository
     */
    protected $repository;

    /**
     * @var StateUpdaterInterface
     */
    protected $stateUpdater;

    public function __construct(StateRepository $repository, Api $api, string $logsDir, StateUpdaterInterface $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->stateUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): ?StateInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @param array $options
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $states = \GuzzleHttp\json_decode((string) $this->api->order->getOrderStates()->getBody());

        foreach ($states as $state) {
            $entity = $this->stateUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($state));
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
