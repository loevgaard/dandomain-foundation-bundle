<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Repository\ManufacturerRepository;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundationBundle\Updater\ManufacturerUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ManufacturerSynchronizer extends Synchronizer implements ManufacturerSynchronizerInterface
{
    /**
     * @var ManufacturerRepository
     */
    protected $repository;

    /**
     * @var ManufacturerUpdaterInterface
     */
    protected $manufacturerUpdater;

    public function __construct(ManufacturerRepository $repository, Api $api, string $logsDir, ManufacturerUpdaterInterface $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->manufacturerUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): OrderInterface
    {
        // @todo implement this the same way as the site synchronizer
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @param array $options
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $manufacturers = \GuzzleHttp\json_decode((string) $this->api->relatedData->getManufacturers()->getBody());
        foreach ($manufacturers as $manufacturer) {
            $entity = $this->manufacturerUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($manufacturer));
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
