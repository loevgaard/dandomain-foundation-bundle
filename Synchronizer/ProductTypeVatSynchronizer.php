<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\ProductTypeVatInterface;

class ProductTypeVatSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeVat';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\ProductTypeVatInterface';

    /**
     * Synchronizes ProductTypeVat.
     *
     * @param array $productTypeVat
     * @param bool  $flush
     *
     * @return ProductTypeVatInterface
     */
    public function syncProductTypeVat($productTypeVat, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'countryId' => $productTypeVat->countryId,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setCountry($productTypeVat->country)
            ->setCountryId($productTypeVat->countryId)
            ->setSiteId($productTypeVat->siteId)
            ->setVatPct($productTypeVat->vatPct)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}