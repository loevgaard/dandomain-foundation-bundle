<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Repository\ManufacturerRepository;

class ManufacturerUpdater implements ManufacturerUpdaterInterface
{
    /**
     * @var ManufacturerRepository
     */
    protected $manufacturerRepository;

    public function __construct(ManufacturerRepository $invoiceRepository)
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
