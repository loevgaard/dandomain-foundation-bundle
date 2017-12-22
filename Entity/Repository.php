<?php

namespace Loevgaard\DandomainFoundationBundle\Entity;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var EntityManager
     */
    protected $manager;

    /**
     * @var ObjectRepository
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

    public function clear(?string $objectName = null)
    {
        $this->manager->clear($objectName);
    }
}
