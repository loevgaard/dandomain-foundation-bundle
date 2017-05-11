<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use Loevgaard\DandomainFoundationBundle\Model\CategoryInterface;

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

        if (null === $actualTexts) {
            return null;
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
            ->setB2bGroupId($category->b2BGroupId)
            ->setCreatedDate($createdDate)
            ->setCustomInfoLayout($category->customInfoLayout)
            ->setCustomListLayout($category->customListLayout)
            ->setDefaultParentId($category->defaultParentId)
            ->setEditedDate($editedDate)
            ->setExternalId($category->number)
            ->setInfoLayout($category->infoLayout)
            ->setInternalId($category->internalId)
            ->setListLayout($category->listLayout)
            ->setModified($category->modified)
            ->setParentIdList($category->parentIdList)
            ->setSegmentIdList($category->segmentIdList)
            ->setTextKeywords($actualTexts->Keywords)
            ->setTextCategoryNumber($actualTexts->categoryNumber)
            ->setTextDescription($actualTexts->description)
            ->setTextExternalId($actualTexts->id)
            ->setTextHidden($actualTexts->hidden)
            ->setTextHiddenMobile($actualTexts->hiddenMobile)
            ->setTextIcon($actualTexts->icon)
            ->setTextImage($actualTexts->image)
            ->setTextLink($actualTexts->link)
            ->setTextMetaDescription($actualTexts->metaDescription)
            ->setTextName($actualTexts->name)
            ->setTextSiteId($actualTexts->siteId)
            ->setTextSortOrder($actualTexts->sortOrder)
            ->setTextString($actualTexts->string)
            ->setTextTitle($actualTexts->title)
            ->setTextUrlname($actualTexts->urlname)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
