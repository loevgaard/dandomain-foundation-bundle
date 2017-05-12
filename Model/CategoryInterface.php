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

    /**
     * Get textKeywords.
     *
     * @return string
     */
    public function getTextKeywords();

    /**
     * Set textKeywords.
     *
     * @param string $textKeywords
     *
     * @return CategoryInterface
     */
    public function setTextKeywords($textKeywords);

    /**
     * Get textCategoryNumber.
     *
     * @return string
     */
    public function getTextCategoryNumber();

    /**
     * Set textCategoryNumber.
     *
     * @param string $textCategoryNumber
     *
     * @return CategoryInterface
     */
    public function setTextCategoryNumber($textCategoryNumber);

    /**
     * Get textDescription.
     *
     * @return string
     */
    public function getTextDescription();

    /**
     * Set textDescription.
     *
     * @param string $textDescription
     *
     * @return CategoryInterface
     */
    public function setTextDescription($textDescription);

    /**
     * Get textExternalId.
     *
     * @return int
     */
    public function getTextExternalId();

    /**
     * Set textExternalId.
     *
     * @param int $textExternalId
     *
     * @return CategoryInterface
     */
    public function setTextExternalId($textExternalId);

    /**
     * Get textHidden.
     *
     * @return bool
     */
    public function getTextHidden();

    /**
     * Set textHidden.
     *
     * @param bool $textHidden
     *
     * @return CategoryInterface
     */
    public function setTextHidden($textHidden);

    /**
     * Get textHiddenMobile.
     *
     * @return bool
     */
    public function getTextHiddenMobile();

    /**
     * Set textHiddenMobile.
     *
     * @param bool $textHiddenMobile
     *
     * @return CategoryInterface
     */
    public function setTextHiddenMobile($textHiddenMobile);

    /**
     * Get textIcon.
     *
     * @return string
     */
    public function getTextIcon();

    /**
     * Set textIcon.
     *
     * @param string $textIcon
     *
     * @return CategoryInterface
     */
    public function setTextIcon($textIcon);

    /**
     * Get textImage.
     *
     * @return string
     */
    public function getTextImage();

    /**
     * Set textImage.
     *
     * @param string $textImage
     *
     * @return CategoryInterface
     */
    public function setTextImage($textImage);

    /**
     * Get textLink.
     *
     * @return string
     */
    public function getTextLink();

    /**
     * Set textLink.
     *
     * @param string $textLink
     *
     * @return CategoryInterface
     */
    public function setTextLink($textLink);

    /**
     * Get textMetaDescription.
     *
     * @return string
     */
    public function getTextMetaDescription();

    /**
     * Set textMetaDescription.
     *
     * @param string $textMetaDescription
     *
     * @return CategoryInterface
     */
    public function setTextMetaDescription($textMetaDescription);

    /**
     * Get textName.
     *
     * @return string
     */
    public function getTextName();

    /**
     * Set textName.
     *
     * @param string $textName
     *
     * @return CategoryInterface
     */
    public function setTextName($textName);

    /**
     * Get textSiteId.
     *
     * @return int
     */
    public function getTextSiteId();

    /**
     * Set textSiteId.
     *
     * @param int $textSiteId
     *
     * @return CategoryInterface
     */
    public function setTextSiteId($textSiteId);

    /**
     * Get textSortOrder.
     *
     * @return int
     */
    public function getTextSortOrder();

    /**
     * Set textSortOrder.
     *
     * @param int $textSortOrder
     *
     * @return CategoryInterface
     */
    public function setTextSortOrder($textSortOrder);

    /**
     * Get textString.
     *
     * @return string
     */
    public function getTextString();

    /**
     * Set textString.
     *
     * @param string $textString
     *
     * @return CategoryInterface
     */
    public function setTextString($textString);

    /**
     * Get textTitle.
     *
     * @return string
     */
    public function getTextTitle();

    /**
     * Set textTitle.
     *
     * @param string $textTitle
     *
     * @return CategoryInterface
     */
    public function setTextTitle($textTitle);

    /**
     * Get textUrlname.
     *
     * @return string
     */
    public function getTextUrlname();

    /**
     * Set textUrlname.
     *
     * @param string $textUrlname
     *
     * @return CategoryInterface
     */
    public function setTextUrlname($textUrlname);
}
