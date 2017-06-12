<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CategoryInterface
{
    /**
     * @return string
     */
    public function getB2bGroupId();

    /**
     * @param string $b2bGroupId
     *
     * @return CategoryInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * Add childrenCategory
     *
     * @param CategoryInterface $childrenCategory
     *
     * @return CategoryInterface
     */
    public function addChildrenCategory(CategoryInterface $childrenCategory);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrenCategories();

    /**
     * Remove childrenCategory
     *
     * @param CategoryInterface $childrenCategory
     *
     * @return CategoryInterface
     */
    public function removeChildrenCategory(CategoryInterface $childrenCategory);

    /**
     * @return \DateTime
     */
    public function getCreatedDate();

    /**
     * @param \DateTime $createdDate
     *
     * @return CategoryInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return int
     */
    public function getCustomInfoLayout();

    /**
     * @param int $customInfoLayout
     *
     * @return CategoryInterface
     */
    public function setCustomInfoLayout($customInfoLayout);

    /**
     * @return int
     */
    public function getCustomListLayout();

    /**
     * @param int $customListLayout
     *
     * @return CategoryInterface
     */
    public function setCustomListLayout($customListLayout);

    /**
     * @return int
     */
    public function getDefaultParentId();

    /**
     * @param int $defaultParentId
     *
     * @return CategoryInterface
     */
    public function setDefaultParentId($defaultParentId);

    /**
     * @return \DateTime
     */
    public function getEditedDate();

    /**
     * @param \DateTime $editedDate
     *
     * @return CategoryInterface
     */
    public function setEditedDate($editedDate);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return CategoryInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getInfoLayout();

    /**
     * @param int $infoLayout
     *
     * @return CategoryInterface
     */
    public function setInfoLayout($infoLayout);

    /**
     * @return int
     */
    public function getInternalId();

    /**
     * @param int $internalId
     *
     * @return CategoryInterface
     */
    public function setInternalId($internalId);

    /**
     * @return int
     */
    public function getListLayout();

    /**
     * @param int $listLayout
     *
     * @return CategoryInterface
     */
    public function setListLayout($listLayout);

    /**
     * @return bool
     */
    public function getModified();

    /**
     * @param bool $modified
     *
     * @return CategoryInterface
     */
    public function setModified($modified);

    /**
     * Add parentCategory
     *
     * @param CategoryInterface $parentCategory
     *
     * @return CategoryInterface
     */
    public function addParentCategory(CategoryInterface $parentCategory);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParentCategories();

    /**
     * Remove parentCategory
     *
     * @param CategoryInterface $parentCategory
     *
     * @return CategoryInterface
     */
    public function removeParentCategory(CategoryInterface $parentCategory);

    /**
     * @return array
     */
    public function getParentIdList();

    /**
     * @param array $parentIdList
     *
     * @return CategoryInterface
     */
    public function setParentIdList($parentIdList);

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return CategoryInterface
     */
    public function addProduct(ProductInterface $product);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts();

    /**
     * Remove product.
     *
     * @param ProductInterface $product
     *
     * @return CategoryInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * Add segment
     *
     * @param SegmentInterface $segment
     *
     * @return CategoryInterface
     */
    public function addSegment(SegmentInterface $segment);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSegments();

    /**
     * Remove segment
     *
     * @param SegmentInterface $segment
     *
     * @return CategoryInterface
     */
    public function removeSegment(SegmentInterface $segment);

    /**
     * @return array
     */
    public function getSegmentIdList();

    /**
     * @param array $segmentIdList
     *
     * @return CategoryInterface
     */
    public function setSegmentIdList($segmentIdList);
}
