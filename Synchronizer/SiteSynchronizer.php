<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Repository\SiteRepository;
use Loevgaard\DandomainFoundationBundle\Updater\SiteUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteSynchronizer extends Synchronizer implements SiteSynchronizerInterface
{
    /**
     * @var SiteRepository
     */
    protected $repository;

    /**
     * @var SiteUpdater
     */
    protected $siteUpdater;

    public function __construct(SiteRepository $repository, Api $api, string $logsDir, SiteUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->siteUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): ?SiteInterface
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
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $sites = \GuzzleHttp\json_decode((string) $this->api->settings->getSites()->getBody());

        foreach ($sites as $site) {
            $entity = $this->siteUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($site));
            $this->repository->save($entity);
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['externalId'])
            ->setAllowedTypes('externalId', 'int')
            ->setRequired('externalId')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
