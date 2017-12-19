<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;
use Loevgaard\DandomainFoundation\Entity\Site;
use Loevgaard\DandomainFoundationBundle\Entity\SiteRepositoryInterface;

class SiteUpdater implements SiteUpdaterInterface
{
    /**
     * @var SiteRepositoryInterface
     */
    protected $siteRepository;

    public function __construct(SiteRepositoryInterface $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function updateFromApiResponse(array $data): SiteInterface
    {
        $site = $this->siteRepository->findOneByExternalId($data['id']);
        if (!$site) {
            $site = new Site();
            $site->setExternalId($data['id']);
        }

        $site
            ->setCountryId($data['countryId'])
            ->setCurrencyCode($data['currencyCode'])
            ->setName($data['name'])
        ;

        return $site;
    }
}
