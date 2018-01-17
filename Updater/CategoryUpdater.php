<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Category;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Loevgaard\DandomainFoundationBundle\Repository\CategoryRepositoryInterface;

class CategoryUpdater implements CategoryUpdaterInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function updateFromApiResponse(array $data): CategoryInterface
    {
        $category = $this->categoryRepository->findOneByNumber($data['number']);
        if (!$category) {
            $category = new Category();
        }

        if ($data['createdDate']) {
            $category->setCreatedDate(DateTimeImmutable::createFromJson($data['createdDate']));
        }

        if ($data['editedDate']) {
            $category->setEditedDate(DateTimeImmutable::createFromJson($data['editedDate']));
        }

        $category
            ->setNumber($data['number'])
            ->setB2bGroupId($data['b2BGroupId'])
            ->setCustomInfoLayout($data['customInfoLayout'])
            ->setCustomListLayout($data['customListLayout'])
            ->setDefaultParentId($data['defaultParentId'])
            ->setExternalId($data['internalId'])
            ->setInfoLayout($data['infoLayout'])
            ->setInternalId($data['internalId'])
            ->setListLayout($data['listLayout'])
            ->setModified($data['modified'])
            ->setParentIdList($data['parentIdList'])
            ->setSegmentIdList($data['segmentIdList'])
        ;

        /*
        if (is_array($data['parentIdList'])) {
            foreach ($data['parentIdList'] as $parentId) {
                $parentEntity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                    'externalId' => (int) $parentId,
                ]);

                if (null !== $parentEntity) {
                    $this->addParentCategory($parentEntity);
                }
            }
        }

        if (is_array($data['segmentIdList'])) {
            foreach ($data['segmentIdList'] as $segmentId) {
                $segment = $this->segmentSynchronizer->syncSegment($segmentId, $flush);
                $this->addSegment($segment);
            }
        }
        */

        foreach ($data['texts'] as $text) {
            $category->translate($text['siteId'])->setCategoryNumber($text['categoryNumber']);
            $category->translate($text['siteId'])->setDescription($text['description']);
            $category->translate($text['siteId'])->setExternalId($text['id']);
            $category->translate($text['siteId'])->setHidden($text['hidden']);
            $category->translate($text['siteId'])->setHiddenMobile($text['hiddenMobile']);
            $category->translate($text['siteId'])->setIcon($text['icon']);
            $category->translate($text['siteId'])->setImage($text['image']);
            $category->translate($text['siteId'])->setKeywords($text['Keywords']);
            $category->translate($text['siteId'])->setLink($text['link']);
            $category->translate($text['siteId'])->setMetaDescription($text['metaDescription']);
            $category->translate($text['siteId'])->setName($text['name']);
            $category->translate($text['siteId'])->setSiteId($text['siteId']);
            $category->translate($text['siteId'])->setSortOrder($text['sortOrder']);
            $category->translate($text['siteId'])->setString($text['string']);
            $category->translate($text['siteId'])->setTitle($text['title']);
            $category->translate($text['siteId'])->setUrlname($text['urlname']);

            $category->mergeNewTranslations();
        }

        return $category;
    }
}
