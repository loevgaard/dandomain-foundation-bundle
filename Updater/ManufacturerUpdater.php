<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundationBundle\Repository\ManufacturerRepositoryInterface;

class ManufacturerUpdater implements ManufacturerUpdaterInterface
{
    /**
     * @var ManufacturerRepositoryInterface
     */
    protected $manufacturerRepository;

    public function __construct(ManufacturerRepositoryInterface $invoiceRepository)
    {
        $this->manufacturerRepository = $invoiceRepository;
    }

    public function updateFromApiResponse(array $data): ManufacturerInterface
    {
        $manufacturer = $this->manufacturerRepository->findOneByExternalId($data['id']);
        if (!$manufacturer) {
            $manufacturer = new Manufacturer();
            $manufacturer->setExternalId($data['id']);
        }

        $manufacturer
            ->setLink($data['link'])
            ->setLinkText($data['linkText'])
            ->setName($data['name'])
        ;

        return $manufacturer;
    }
}
