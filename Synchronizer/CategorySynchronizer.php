<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundation\Repository\CategoryRepository;
use Loevgaard\DandomainFoundationBundle\Updater\CategoryUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorySynchronizer extends Synchronizer implements CategorySynchronizerInterface
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @var CategoryUpdater
     */
    protected $categoryUpdater;

    public function __construct(CategoryRepository $repository, Api $api, string $logsDir, CategoryUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->categoryUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []): ?CategoryInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $category = \GuzzleHttp\json_decode((string) $this->api->productData->getDataCategory($options['externalId'])->getBody());
        $entity = $this->categoryUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($category));

        try {
            $this->repository->save($entity);

            return $entity;
        } catch (OptimisticLockException $e) {
            return null;
        }
    }

    /**
     * @param array $options
     * @throws OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function syncAll(array $options = [])
    {
        $this->logger->info('Synchronizing categories');
        $this->recursiveSync(0);

        $cache = [];

        $this->logger->info('Synchronizing parent/child relationships');

        // when all categories has been saved we iterate through them to update their parent/child relationship
        // @todo this should probably be moved to the updater
        foreach ($this->repository->iterate(['update' => true]) as $category) {
            foreach ($category->getParentIdList() as $parentNumber) {
                if(isset($cache[$parentNumber])) {
                    $parent = $this->repository->getReference($cache[$parentNumber]);
                } else {
                    // @todo if an existing relationship that has been deleted in Dandomain then it isn't updated here
                    $parent = $this->repository->findOneByNumber($parentNumber);
                    $cache[$parentNumber] = $parent->getId();
                }

                if ($parent) {
                    $category->addParentCategory($parent);
                }
            }
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['externalId'])
            ->setAllowedTypes('externalId', 'int')
            ->setRequired('externalId')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }

    /**
     * @param int|null $parentCategoryNumber
     * @param int $level
     *
     * @throws OptimisticLockException
     */
    private function recursiveSync(int $parentCategoryNumber = null, int $level = 1)
    {
        if ($parentCategoryNumber) {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataSubCategories($parentCategoryNumber)->getBody()->getContents());
        } else {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataCategories()->getBody()->getContents());
        }

        foreach ($categories as $category) {
            $entity = $this->categoryUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($category));
            $this->logger->info(str_repeat('  ', $level - 1).'- '.$entity->getNumber());
            $this->repository->save($entity);
            $this->recursiveSync((int) $category->number, $level + 1);
        }
    }
}
