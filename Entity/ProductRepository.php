<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Product;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    /**
     * @param string $number
     * @return ProductInterface|null
     */
    public function findOneByProductNumber(string $number): ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'number' => $number
        ]);

        return $obj;
    }

    public function findOneByExternalId(int $externalId) : ?ProductInterface
    {
        /** @var ProductInterface $obj */
        $obj = $this->repository->findOneBy([
            'externalId' => $externalId
        ]);

        return $obj;
    }

    /**
     * @param ProductInterface $obj
     */
    /*
    public function save($obj)
    {
        $objectManager = $this->manager;

        if(!$obj->getId()) {
            // check if product exists
            $productEntity = $objectManager->getRepository(Product::class)->findOneBy([
                'externalId' => $obj->getExternalId()
            ]);

            if ($productEntity) {
                $obj = $objectManager->merge($obj);
            }
        }

        $remove = [];
        $add = [];

        foreach ($obj->getManufacturers() as $manufacturer) {
            if($manufacturer->getId()) {
                continue;
            }

            $manufacturerEntity = $objectManager->getRepository(Manufacturer::class)->findOneBy([
                'externalId' => $manufacturer->getExternalId()
            ]);

            if($manufacturerEntity) {
                $add[] = $objectManager->merge($manufacturer);
                $remove[] = $manufacturer;
            }
        }

        foreach ($remove as $value) {
            $obj->removeManufacturer($value);
        }

        foreach ($add as $value) {
            $obj->addManufacturer($value);
        }

        parent::save($obj);
    }
    */
}