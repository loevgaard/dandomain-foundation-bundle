<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Category implements CategoryInterface
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
    protected $products;

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
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textKeywords;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textCategoryNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $textDescription;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $textExternalId;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $textHidden;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $textHiddenMobile;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textIcon;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textImage;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textLink;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textMetaDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textName;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $textSiteId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $textSortOrder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textString;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textTitle;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $textUrlname;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    /**
     * {@inheritdoc}
     */
    public function getTextKeywords()
    {
        return $this->textKeywords;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextKeywords($textKeywords)
    {
        $this->textKeywords = $textKeywords;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextCategoryNumber()
    {
        return $this->textCategoryNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextCategoryNumber($textCategoryNumber)
    {
        $this->textCategoryNumber = $textCategoryNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextDescription()
    {
        return $this->textDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextDescription($textDescription)
    {
        $this->textDescription = $textDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextExternalId()
    {
        return $this->textExternalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextExternalId($textExternalId)
    {
        $this->textExternalId = $textExternalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextHidden()
    {
        return $this->textHidden;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextHidden($textHidden)
    {
        $this->textHidden = $textHidden;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextHiddenMobile()
    {
        return $this->textHiddenMobile;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextHiddenMobile($textHiddenMobile)
    {
        $this->textHiddenMobile = $textHiddenMobile;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextIcon()
    {
        return $this->textIcon;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextIcon($textIcon)
    {
        $this->textIcon = $textIcon;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextImage()
    {
        return $this->textImage;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextImage($textImage)
    {
        $this->textImage = $textImage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextLink()
    {
        return $this->textLink;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextLink($textLink)
    {
        $this->textLink = $textLink;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextMetaDescription()
    {
        return $this->textMetaDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextMetaDescription($textMetaDescription)
    {
        $this->textMetaDescription = $textMetaDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextName()
    {
        return $this->textName;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextName($textName)
    {
        $this->textName = $textName;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextSiteId()
    {
        return $this->textSiteId;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextSiteId($textSiteId)
    {
        $this->textSiteId = $textSiteId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextSortOrder()
    {
        return $this->textSortOrder;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextSortOrder($textSortOrder)
    {
        $this->textSortOrder = $textSortOrder;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextString()
    {
        return $this->textString;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextString($textString)
    {
        $this->textString = $textString;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextTitle()
    {
        return $this->textTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextTitle($textTitle)
    {
        $this->textTitle = $textTitle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTextUrlname()
    {
        return $this->textUrlname;
    }

    /**
     * {@inheritdoc}
     */
    public function setTextUrlname($textUrlname)
    {
        $this->textUrlname = $textUrlname;

        return $this;
    }
}
