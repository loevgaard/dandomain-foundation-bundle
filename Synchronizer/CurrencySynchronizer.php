<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;
use Loevgaard\DandomainFoundationBundle\Updater\CurrencyUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CurrencySynchronizer extends Synchronizer implements CurrencySynchronizerInterface
{
    /**
     * @var CurrencyRepository
     */
    protected $repository;

    /**
     * @var CurrencyUpdaterInterface
     */
    protected $currencyUpdater;

    public function __construct(CurrencyRepository $repository, Api $api, string $logsDir, CurrencyUpdaterInterface $currencyUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->currencyUpdater = $currencyUpdater;
    }

    public function syncOne(array $options = []): ?CurrencyInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);

        try {
            $this->syncAll();
        } catch (OptimisticLockException $e) {
            return null;
        }

        return $this->repository->findOneByCode($options['code']);
    }

    /**
     * @param array $options
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $this->logger->info('Synchronizing currencies');

        $currencies = \GuzzleHttp\json_decode((string) $this->api->settings->getCurrencies()->getBody());

        foreach ($currencies as $currency) {
            $entity = $this->currencyUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($currency));
            $this->logger->info('- '.$entity->getIsoCodeAlpha());
            $this->repository->save($entity);
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['code'])
            ->setAllowedTypes('code', 'string')
            ->setRequired('code')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
