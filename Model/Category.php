<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Category implements CategoryInterface, TranslatableInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $childrenCategories;

    /**
     * @var ArrayCollection
     */
    protected $parentCategories;

    /**
     * @var ArrayCollection
     */
    protected $products;

    /**
     * @var ArrayCollection
     */
    protected $segments;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $createdDate;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $customInfoLayout;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $customListLayout;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $defaultParentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $editedDate;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $infoLayout;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $internalId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $listLayout;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $modified;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $parentIdList;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $segmentIdList;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->childrenCategories = new ArrayCollection();
        $this->parentCategories = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->segments = new ArrayCollection();
    }

    /**
     * To string.
     */
    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getB2bGroupId()
    {
        return $this->b2bGroupId;
    }

    /**
     * {@inheritdoc}
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addChildrenCategory(CategoryInterface $childrenCategory)
    {
        if (!($this->childrenCategories->contains($childrenCategory))) {
            $this->childrenCategories[] = $childrenCategory;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildrenCategories()
    {
        return $this->childrenCategories;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChildrenCategory(CategoryInterface $childrenCategory)
    {
        $this->childrenCategories->removeElement($childrenCategory);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomInfoLayout()
    {
        return $this->customInfoLayout;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomInfoLayout($customInfoLayout)
    {
        $this->customInfoLayout = $customInfoLayout;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomListLayout()
    {
        return $this->customListLayout;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomListLayout($customListLayout)
    {
        $this->customListLayout = $customListLayout;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultParentId()
    {
        return $this->defaultParentId;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultParentId($defaultParentId)
    {
        $this->defaultParentId = $defaultParentId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEditedDate()
    {
        return $this->editedDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setEditedDate($editedDate)
    {
        $this->editedDate = $editedDate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getInfoLayout()
    {
        return $this->infoLayout;
    }

    /**
     * {@inheritdoc}
     */
    public function setInfoLayout($infoLayout)
    {
        $this->infoLayout = $infoLayout;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getListLayout()
    {
        return $this->listLayout;
    }

    /**
     * {@inheritdoc}
     */
    public function setListLayout($listLayout)
    {
        $this->listLayout = $listLayout;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * {@inheritdoc}
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addParentCategory(CategoryInterface $parentCategory)
    {
        if (!($this->parentCategories->contains($parentCategory))) {
            $this->parentCategories[] = $parentCategory;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParentCategories()
    {
        return $this->parentCategories;
    }

    /**
     * {@inheritdoc}
     */
    public function removeParentCategory(CategoryInterface $parentCategory)
    {
        $this->parentCategories->removeElement($parentCategory);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParentIdList()
    {
        return $this->parentIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setParentIdList($parentIdList)
    {
        $this->parentIdList = $parentIdList;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addProduct(ProductInterface $product)
    {
        if (!($this->products->contains($product))) {
            $this->products[] = $product;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProduct(ProductInterface $product)
    {
        $this->products->removeElement($product);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addSegment(SegmentInterface $segment)
    {
        if (!($this->segments->contains($segment))) {
            $this->segments[] = $segment;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * {@inheritdoc}
     */
    public function removeSegment(SegmentInterface $segment)
    {
        $this->segments->removeElement($segment);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSegmentIdList()
    {
        return $this->segmentIdList;
    }

    /**
     * {@inheritdoc}
     */
    public function setSegmentIdList($segmentIdList)
    {
        $this->segmentIdList = $segmentIdList;

        return $this;
    }
}
