<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Site;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;
use Loevgaard\DandomainFoundation\Repository\SiteRepository;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CurrencySynchronizerInterface;

class SiteUpdater implements SiteUpdaterInterface
{
    /**
     * @var SiteRepository
     */
    protected $siteRepository;

    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * @var CurrencySynchronizerInterface
     */
    protected $currencySynchronizer;

    public function __construct(SiteRepository $siteRepository, CurrencyRepository $currencyRepository, CurrencySynchronizerInterface $currencySynchronizer)
    {
        $this->siteRepository = $siteRepository;
        $this->currencyRepository = $currencyRepository;
        $this->currencySynchronizer = $currencySynchronizer;
    }

    public function updateFromApiResponse(array $data): SiteInterface
    {
        $site = $this->siteRepository->findOneByExternalId($data['id']);
        if (!$site) {
            $site = new Site();
            $site->setExternalId($data['id']);
        }

        $currency = $this->currencyRepository->findOneByCode($data['currencyCode']);
        if (!$currency) {
            $currency = $this->currencySynchronizer->syncOne([
                'code' => $data['currencyCode'],
            ]);

            if (!$currency) {
                throw new \RuntimeException('Could not sync currency `'.$data['currencyCode'].'`. Try again');
            }
        }

        $site
            ->setCountryId($data['countryId'])
            ->setName($data['name'])
            ->setCurrency($currency)
        ;

        return $site;
    }
}
