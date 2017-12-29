<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var EntityManager
     */
    protected $manager;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    public function __construct(ManagerRegistry $managerRegistry, string $class)
    {
        $this->manager = $managerRegistry->getManagerForClass($class);
        if (!$this->manager) {
            throw new \RuntimeException('No manager exists for class '.$class);
        }
        $this->repository = $this->manager->getRepository($class);
        $this->class = $class;
    }

    public function save($obj)
    {
        $this->manager->persist($obj);
        $this->manager->flush($obj);
    }

    /**
     * @todo we should probably handle some of the possible return values here
     *
     * @param $id
     * @return bool|\Doctrine\Common\Proxy\Proxy|null|object
     * @throws \Doctrine\ORM\ORMException
     */
    public function getReference($id)
    {
        return $this->manager->getReference($this->class, $id);
    }

    public function clearAll()
    {
        $this->manager->clear();
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->repository, $name)) {
            return call_user_func_array([$this->repository, $name], $arguments);
        }

        if (method_exists($this->manager, $name)) {
            return call_user_func_array([$this->manager, $name], $arguments);
        }

        throw new \RuntimeException('Method '.$name.' not defined in '.__CLASS__);
    }
}
