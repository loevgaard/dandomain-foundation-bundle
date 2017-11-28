<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundationBundle\Entity\ManufacturerRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Entity\ProductRepositoryInterface;

class ProductUpdater
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ManufacturerRepositoryInterface
     */
    protected $manufacturerRepository;

    public function __construct(ProductRepositoryInterface $productRepository, ManufacturerRepositoryInterface $manufacturerRepository)
    {
        $this->productRepository = $productRepository;
        $this->manufacturerRepository = $manufacturerRepository;
    }

    public function updateFromApiResponse(array $data) : ProductInterface
    {
        $entity = $this->productRepository->findOneByExternalId((int)$data['id']);

        if (!$entity) {
            $entity = new Product();
        }

        $entity->populateFromApiResponse($data);

        $this->updateManufacturersFromApiResponse($entity, $data['manufacturers'] ?? []);

        return $entity;
    }

    public function updateManufacturersFromApiResponse(ProductInterface $product, array $data)
    {
        foreach ($data as $item) {
            $manufacturer = $this->manufacturerRepository->findOneByExternalId($item['id']);

            if(!$manufacturer) {
                $manufacturer = new Manufacturer();
                $manufacturer->populateFromApiResponse($item);
            }

            $product->addManufacturer($manufacturer);
        }
    }
}