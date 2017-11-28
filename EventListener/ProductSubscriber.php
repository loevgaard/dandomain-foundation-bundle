<?php
namespace Loevgaard\DandomainFoundationBundle\EventListener;

use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Manufacturer;
use Loevgaard\DandomainFoundation\Entity\Product;

class ProductSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
            Events::preUpdate,
        );
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->process($args);
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->process($args);
    }

    private function process(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $objectManager = $args->getObjectManager();

        if ($entity instanceof ProductInterface) {


            // check if product exists
            $productEntity = $objectManager->getRepository(Product::class)->findOneBy([
                'externalId' => $entity->getExternalId()
            ]);

            if($productEntity) {
                $objectManager->merge($entity);
            }

            foreach ($entity->getManufacturers() as $manufacturer) {
                $manufacturerEntity = $objectManager->getRepository(Manufacturer::class)->findOneBy([
                    'externalId' => $manufacturer->getExternalId()
                ]);

                print_r($manufacturer);

                if($manufacturerEntity) {
                    $objectManager->merge($manufacturer);
                }
            }
        } elseif ($entity instanceof ManufacturerInterface) {
            $manufacturerEntity = $objectManager->getRepository(Manufacturer::class)->findOneBy([
                'externalId' => $entity->getExternalId()
            ]);
            if($manufacturerEntity) {
                $objectManager->merge($entity);
            }
            //echo "HESDAFASDFSFAD";exit;
        }
    }
}