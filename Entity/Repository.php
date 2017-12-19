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
        $this->manager->flush();
    }
}
