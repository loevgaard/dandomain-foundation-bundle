<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundationBundle\Repository\SiteRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\SiteUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CurrencySynchronizer extends Synchronizer implements CurrencySynchronizerInterface
{
    /**
     * @var SiteRepositoryInterface
     */
    protected $repository;

    /**
     * @var SiteUpdater
     */
    protected $siteUpdater;

    public function __construct(CurrencyRepository $repository, Api $api, string $logsDir, SiteUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->siteUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): ?CurrencyInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);

        $this->syncAll();

        return $this->repository->findOneByExternalId($options['externalId']);
    }

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
