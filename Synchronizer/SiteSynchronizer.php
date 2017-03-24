<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\SiteInterface;

class SiteSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Site';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\SiteInterface';

    /**
     * Synchronizes Site.
     *
     * @param array $site
     * @param bool  $flush
     *
     * @return SiteInterface
     */
    public function syncSite($site, $flush = true)
    {
        if (is_numeric($site)) {
            $site = \GuzzleHttp\json_decode($this->api->site->getSite($site)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $site->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($site->id)
            ->setCountryId($site->countryId)
            ->setCurrencyCode($site->currencyCode)
            ->setName($site->name)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
