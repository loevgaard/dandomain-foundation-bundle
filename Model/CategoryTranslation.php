<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class CategoryTranslation implements CategoryTranslationInterface
{
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
