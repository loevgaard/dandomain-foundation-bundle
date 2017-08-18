<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class Manager implements ManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $class;

    public function __construct(ManagerRegistry $registry, $class)
    {
        $this->class = $this->setClass($class);
        $this->objectManager = $registry->getManagerForClass($this->class);
    }

    /**
     * @return ObjectRepository
     */
    protected function getRepository()
    {
        return $this->objectManager->getRepository($this->getClass());
    }

    /**
     * @param string $class
     * @return ManagerInterface
     */
    public function setClass($class) {
        if (false !== strpos($this->class, ':')) {
            $metadata = $this->objectManager->getClassMetadata($this->class);
            $class = $metadata->getName();
        }
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Returns an instantiated entity class
     *
     * @return mixed
     */
    public function create()
    {
        $class = $this->getClass();
        $obj = new $class();
        return $obj;
    }

    /**
     * @param mixed $obj The entity
     */
    public function delete($obj)
    {
        $this->objectManager->remove($obj);
        $this->objectManager->flush();
    }

    /**
     * Will update/save the entity
     *
     * @param mixed $obj The entity
     * @param bool $flush
     */
    public function update($obj, $flush = true)
    {
        $this->objectManager->persist($obj);

        if($flush) {
            $this->objectManager->flush();
        }
    }
}
