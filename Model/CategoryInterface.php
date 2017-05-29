<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CategoryInterface
{
    /**
     * Get b2bGroupId.
     *
     * @return string
     */
    public function getB2bGroupId();

    /**
     * Set b2bGroupId.
     *
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
     * Get childrenCategories
     *
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
     * Get createdDate.
     *
     * @return \DateTime
     */
    public function getCreatedDate();

    /**
     * Set createdDate.
     *
     * @param \DateTime $createdDate
     *
     * @return CategoryInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * Get customInfoLayout.
     *
     * @return int
     */
    public function getCustomInfoLayout();

    /**
     * Set customInfoLayout.
     *
     * @param int $customInfoLayout
     *
     * @return CategoryInterface
     */
    public function setCustomInfoLayout($customInfoLayout);

    /**
     * Get customListLayout.
     *
     * @return int
     */
    public function getCustomListLayout();

    /**
     * Set customListLayout.
     *
     * @param int $customListLayout
     *
     * @return CategoryInterface
     */
    public function setCustomListLayout($customListLayout);

    /**
     * Get defaultParentId.
     *
     * @return int
     */
    public function getDefaultParentId();

    /**
     * Set defaultParentId.
     *
     * @param int $defaultParentId
     *
     * @return CategoryInterface
     */
    public function setDefaultParentId($defaultParentId);

    /**
     * Get editedDate.
     *
     * @return \DateTime
     */
    public function getEditedDate();

    /**
     * Set editedDate.
     *
     * @param \DateTime $editedDate
     *
     * @return CategoryInterface
     */
    public function setEditedDate($editedDate);

    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return CategoryInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get infoLayout.
     *
     * @return int
     */
    public function getInfoLayout();

    /**
     * Set infoLayout.
     *
     * @param int $infoLayout
     *
     * @return CategoryInterface
     */
    public function setInfoLayout($infoLayout);

    /**
     * Get internalId.
     *
     * @return int
     */
    public function getInternalId();

    /**
     * Set internalId.
     *
     * @param int $internalId
     *
     * @return CategoryInterface
     */
    public function setInternalId($internalId);

    /**
     * Get listLayout.
     *
     * @return int
     */
    public function getListLayout();

    /**
     * Set listLayout.
     *
     * @param int $listLayout
     *
     * @return CategoryInterface
     */
    public function setListLayout($listLayout);

    /**
     * Get modified.
     *
     * @return bool
     */
    public function getModified();

    /**
     * Set modified.
     *
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
     * Get parentCategories
     *
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
     * Get parentIdList.
     *
     * @return array
     */
    public function getParentIdList();

    /**
     * Set parentIdList.
     *
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
     * Get products.
     *
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
     * Get segments
     *
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
     * Get segmentIdList.
     *
     * @return array
     */
    public function getSegmentIdList();

    /**
     * Set segmentIdList.
     *
     * @param array $segmentIdList
     *
     * @return CategoryInterface
     */
    public function setSegmentIdList($segmentIdList);
}
