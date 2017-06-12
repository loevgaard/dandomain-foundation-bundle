<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use Loevgaard\DandomainFoundationBundle\Model\CategoryInterface;
use Loevgaard\DandomainFoundationBundle\Model\TranslatableInterface;

class CategorySynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $defaultSiteId = 23;

    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Category';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\CategoryInterface';

    /**
     * @var SegmentSynchronizer
     */
    protected $segmentSynchronizer;

    /**
     * Set segmentSynchronizer.
     *
     * @param SegmentSynchronizer $segmentSynchronizer
     *
     * @return CategorySynchronizer
     */
    public function setSegmentSynchronizer(SegmentSynchronizer $segmentSynchronizer)
    {
        $this->segmentSynchronizer = $segmentSynchronizer;

        return $this;
    }

    /**
     * Constructor.
     *
     * @param EntityManager $em
     * @param Api           $api
     * @param string        $entityClassName
     * @param string        $defaultSiteId
     */
    public function __construct(EntityManager $em, Api $api, $entityClassName, $defaultSiteId)
    {
        parent::__construct($em, $api, $entityClassName);
        $this->defaultSiteId = $defaultSiteId;
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
}
