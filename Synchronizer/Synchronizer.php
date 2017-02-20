<?php
namespace Loevgaard\DandomainFoundation\Synchronizer;

use Doctrine\Common\Persistence\ObjectManager;
use Dandomain\Api\Api as DandomainApi;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Synchronizer implements SynchronizerInterface {
    /** @var ObjectManager */
    protected $objectManager;

    /** @var DandomainApi */
    protected $api;

    /** @var OutputInterface */
    protected $output;

    /** @var string */
    protected $entityInterfaceName;

    /** @var string */
    protected $entityClassName;

    /** @var SiteSynchronizer */
    protected $siteSynchronizer;

    /** @var StateSynchronizer */
    protected $stateSynchronizer;

    /**
     * @param ObjectManager $objectManager
     * @param DandomainApi $api
     * @param string $entityClassName
     */
    public function __construct(ObjectManager $objectManager, DandomainApi $api, $entityClassName = null)
    {
        $this->objectManager    = $objectManager;
        $this->api              = $api;
        $this->output           = new NullOutput();

        if($entityClassName) {
            $interfaces = class_implements($entityClassName);
            if(!isset($interfaces[$this->entityInterfaceName])) {
                throw new \InvalidArgumentException("Class '$entityClassName' should implement {$this->entityInterfaceName}");
            }
            $this->entityClassName  = $entityClassName;
        }
    }

    /**
     * @param OutputInterface $output
     * @return Synchronizer
     */
    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }


    /**
     * @return SiteSynchronizer
     */
    public function getSiteSynchronizer() {
        if(!$this->siteSynchronizer) {
            $this->siteSynchronizer = new SiteSynchronizer($this->objectManager, $this->api);
        }

        return $this->siteSynchronizer;
    }

    /**
     * @return StateSynchronizer
     */
    public function getStateSynchronizer() {
        if(!$this->stateSynchronizer) {
            $this->stateSynchronizer = new StateSynchronizer($this->objectManager, $this->api);
        }

        return $this->stateSynchronizer;
    }

    /**
     * @param SiteSynchronizer $siteSynchronizer
     * @return Synchronizer
     */
    public function setEntityClassName(SiteSynchronizer $siteSynchronizer)
    {
        $this->siteSynchronizer = $siteSynchronizer;
        return $this;
    }
}