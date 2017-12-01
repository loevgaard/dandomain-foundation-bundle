<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundationBundle\Model\CategoryInterface;
use Loevgaard\DandomainFoundationBundle\Model\TranslatableInterface;
use Loevgaard\DandomainFoundationBundle\Updater\CategoryUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorySynchronizer extends Synchronizer implements CategorySynchronizerInterface
{
    /**
     * @var CategoryUpdater
     */
    protected $categoryUpdater;

    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir, CategoryUpdater $categoryUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->categoryUpdater = $categoryUpdater;
    }

    public function syncOne(array $options = [])
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $category = \GuzzleHttp\json_decode((string)$this->api->productData->getDataCategory($options['id'])->getBody());
        $entity = $this->categoryUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($category));
        $this->repository->save($entity);
    }

    public function syncAll(array $options = [])
    {
        $this->recursiveSync(0);
    }

    private function recursiveSync(int $parentCategoryNumber = null)
    {
        if($parentCategoryNumber) {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataSubCategories($parentCategoryNumber)->getBody()->getContents());
        } else {
            $categories = \GuzzleHttp\json_decode($this->api->productData->getDataCategories()->getBody()->getContents());
        }

        foreach ($categories as $category) {
            $this->categoryUpdater->updateFromApiResponse($category);
            $this->recursiveSync((int)$category->number);
        }
    }

    /**
     * Synchronizes Category.
     *
     * @param \stdClass $category
     * @param bool      $flush
     *
     * @return CategoryInterface|null
     */
    public function syncCategory($category, $flush = true)
    {
        /** @var CategoryInterface $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => (int) $category->number,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $actualTexts = null;

        if (is_array($category->texts)) {
            foreach ($category->texts as $text) {
                if ($text->siteId != $this->defaultSiteId) {
                    continue;
                }

                $actualTexts = $text;
            }
        }

        if ($category->createdDate) {
            $createdDate = \Dandomain\Api\jsonDateToDate($category->createdDate);
            $createdDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $createdDate = null;
        }

        if ($category->editedDate) {
            $editedDate = \Dandomain\Api\jsonDateToDate($category->editedDate);
            $editedDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $editedDate = null;
        }

        $entity
            ->setB2bGroupId($category->b2BGroupId ? : null)
            ->setCreatedDate($createdDate ? : null)
            ->setCustomInfoLayout($category->customInfoLayout ? : null)
            ->setCustomListLayout($category->customListLayout ? : null)
            ->setDefaultParentId($category->defaultParentId ? : null)
            ->setEditedDate($editedDate ? : null)
            ->setExternalId($category->number ? : null)
            ->setInfoLayout($category->infoLayout ? : null)
            ->setInternalId($category->internalId ? : null)
            ->setListLayout($category->listLayout ? : null)
            ->setModified($category->modified ? : null)
            ->setParentIdList($category->parentIdList ? : null)
            ->setSegmentIdList($category->segmentIdList ? : null)
        ;

        if (is_array($category->parentIdList)) {
            foreach ($category->parentIdList as $parentId) {
                $parentEntity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                    'externalId' => (int) $parentId,
                ]);

                if (null !== $parentEntity) {
                    $entity->addParentCategory($parentEntity);
                }
            }
        }

        if (is_array($category->segmentIdList)) {
            foreach ($category->segmentIdList as $segmentId) {
                $segment = $this->segmentSynchronizer->syncSegment($segmentId, $flush);
                $entity->addSegment($segment);
            }
        }

        if (($entity instanceof TranslatableInterface) && (is_array($category->texts))) {
            foreach ($category->texts as $text) {
                $entity->translate($text->siteId)->setCategoryNumber($text->categoryNumber);
                $entity->translate($text->siteId)->setDescription($text->description);
                $entity->translate($text->siteId)->setExternalId($text->id);
                $entity->translate($text->siteId)->setHidden($text->hidden);
                $entity->translate($text->siteId)->setHiddenMobile($text->hiddenMobile);
                $entity->translate($text->siteId)->setIcon($text->icon);
                $entity->translate($text->siteId)->setImage($text->image);
                $entity->translate($text->siteId)->setKeywords($text->Keywords);
                $entity->translate($text->siteId)->setLink($text->link);
                $entity->translate($text->siteId)->setMetaDescription($text->metaDescription);
                $entity->translate($text->siteId)->setName($text->name);
                $entity->translate($text->siteId)->setSiteId($text->siteId);
                $entity->translate($text->siteId)->setSortOrder($text->sortOrder);
                $entity->translate($text->siteId)->setString($text->string);
                $entity->translate($text->siteId)->setTitle($text->title);
                $entity->translate($text->siteId)->setUrlname($text->urlname);

                $entity->mergeNewTranslations();
            }
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['id'])
            ->setAllowedTypes('id', 'int')
            ->setRequired('id')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {

    }
}
