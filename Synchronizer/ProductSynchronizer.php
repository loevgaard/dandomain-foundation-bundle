<?php
namespace Loevgaard\DandomainFoundation\Synchronizer;

use Dandomain\Api\Api as DandomainApi;
use Doctrine\Common\Persistence\ObjectManager;

class ProductSynchronizer implements SynchronizerInterface {
    /** @var ObjectManager */
    protected $objectManager;

    /** @var DandomainApi */
    protected $api;

    /** @var string */
    protected $entityClassName = 'Loevgaard\\Model\\Product';

    public function __construct(ObjectManager $objectManager, DandomainApi $api, $entityClassName = null)
    {
        $this->objectManager    = $objectManager;
        $this->api              = $api;

        if($entityClassName) {
            $interfaces = class_implements($entityClassName);
            if(!isset($interfaces['Loevgaard\\Model\\ProductInterface'])) {
                throw new \InvalidArgumentException("Class '$entityClassName' should implement {$this->entityClassName}");
            }
        }
    }

    protected function syncProduct($product, $flush = true) {

    }
}