<?php
namespace Loevgaard\DandomainFoundationBundle\EventListener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Loevgaard\DandomainFoundation\Entity\Category;
use Loevgaard\DandomainFoundation\Entity\Order;
use Loevgaard\DandomainFoundation\Entity\Product;

/**
 * This subscriber will add indices to the properties createdAt and updatedAt in the entities written in the $entities variable
 */
class ClassMetaDataSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        $classMetaData = $args->getClassMetadata();

        $entities = [Category::class, Order::class, Product::class];

        if(!in_array($classMetaData->getName(), $entities)) {
            return;
        }

        $properties = ['createdAt', 'updatedAt'];
        foreach ($properties as $property) {
            if(!$classMetaData->hasField($property)) {
                throw new \RuntimeException('No property with the name `'.$property.'`');
            }
        }

        $namingStrategy = $args
            ->getEntityManager()
            ->getConfiguration()
            ->getNamingStrategy()
        ;

        $indices = $classMetaData->table['indexes'] ?? [];

        foreach ($properties as $property) {
            $propertyNamed = $namingStrategy->propertyToColumnName($property);
            $indices[$propertyNamed] = [
                'columns' => [$propertyNamed]
            ];
        }

        $classMetaData->setPrimaryTable([
            'indexes' => $indices
        ]);
    }
}