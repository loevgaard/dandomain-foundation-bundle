<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundationBundle\Entity\SiteRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\SiteUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteSynchronizer extends Synchronizer implements SiteSynchronizerInterface
{
    /**
     * @var SiteRepositoryInterface
     */
    protected $repository;

    /**
     * @var SiteUpdater
     */
    protected $siteUpdater;

    public function __construct(SiteRepositoryInterface $repository, Api $api, string $logsDir, SiteUpdater $periodUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->siteUpdater = $periodUpdater;
    }

    public function syncOne(array $options = []) : ?SiteInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);

        $this->syncAll();

        return $this->repository->findOneByExternalId($options['externalId']);
    }

    public function syncAll(array $options = [])
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsAll']);

        $sites = \GuzzleHttp\json_decode((string)$this->api->settings->getSites()->getBody());

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
