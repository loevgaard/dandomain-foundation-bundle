<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var ObjectManager
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
        $this->class = $class;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository() : ObjectRepository
    {
        if(!$this->repository) {
            $this->repository = $this->manager->getRepository($this->class);
        }

        return $this->repository;
    }

    public function save($obj)
    {
        $this->manager->persist($obj);
        $this->manager->flush();
    }
}