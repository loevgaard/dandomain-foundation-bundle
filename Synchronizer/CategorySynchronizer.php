<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundationBundle\Repository\CategoryRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\CategoryUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorySynchronizer extends Synchronizer implements CategorySynchronizerInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $repository;

    /**
     * @var CategoryUpdater
     */
    protected $categoryUpdater;

    public function __construct(CategoryRepositoryInterface $repository, Api $api, string $logsDir, CategoryUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->categoryUpdater = $stateUpdater;
    }

    public function syncOne(array $options = [])
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $category = \GuzzleHttp\json_decode((string) $this->api->productData->getDataCategory($options['id'])->getBody());
        $entity = $this->categoryUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($category));
        $this->repository->save($entity);
    }

    public function syncAll(array $options = [])
    {
        $this->recursiveSync(0);

        // when all categories has been saved we iterate through them to update their parent/child relationship
        // @todo this should probably be moved to the updater
        foreach ($this->repository->iterator(['update' => true]) as $category) {
            foreach ($category->getParentIdList() as $parentNumber) {
                // @todo create a reference cache so we don't need to query the database for each parent
                // @todo if an existing relationship that has been deleted in Dandomain then it isnt updated here
                $parent = $this->repository->findOneByNumber($parentNumber);

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

    private function recursiveSync(int $parentCategoryNumber = null)
    {
        if ($parentCategoryNumber) {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataSubCategories($parentCategoryNumber)->getBody()->getContents());
        } else {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataCategories()->getBody()->getContents());
        }

        foreach ($categories as $category) {
            $entity = $this->categoryUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($category));
            $this->repository->save($entity);
            $this->recursiveSync((int) $category->number);
        }
    }
}
