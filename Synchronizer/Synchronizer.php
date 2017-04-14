<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Doctrine\Common\Persistence\ObjectManager;
use Dandomain\Api\Api as DandomainApi;
use Symfony\Component\Console\Output\NullOutput;

abstract class Synchronizer
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     *@var DandomainApi
     */
    protected $api;

    /**
     * @var string
     */
    protected $entityInterfaceName;

    /**
     * @var string
     */
    protected $entityClassName;

    /**
     * @param ObjectManager $objectManager
     * @param DandomainApi  $api
     * @param string        $entityClassName
     */
    public function __construct(ObjectManager $objectManager, DandomainApi $api, $entityClassName = null)
    {
        $this->objectManager = $objectManager;
        $this->api = $api;
        $this->output = new NullOutput();

        if ($entityClassName) {
            $interfaces = class_implements($entityClassName);
            if (!isset($interfaces[$this->entityInterfaceName])) {
                throw new \InvalidArgumentException("Class '$entityClassName' should implement {$this->entityInterfaceName}");
            }
            $this->entityClassName = $entityClassName;
        }
    }
}
