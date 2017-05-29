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
    protected $categoryNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $description;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hidden;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $hiddenMobile;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $icon;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $keywords;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $link;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $string;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $urlname;

    /**
     * {@inheritdoc}
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * {@inheritdoc}
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategoryNumber()
    {
        return $this->categoryNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setCategoryNumber($categoryNumber)
    {
        $this->categoryNumber = $categoryNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * {@inheritdoc}
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHiddenMobile()
    {
        return $this->hiddenMobile;
    }

    /**
     * {@inheritdoc}
     */
    public function setHiddenMobile($hiddenMobile)
    {
        $this->hiddenMobile = $hiddenMobile;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * {@inheritdoc}
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * {@inheritdoc}
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * {@inheritdoc}
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * {@inheritdoc}
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * {@inheritdoc}
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * {@inheritdoc}
     */
    public function setString($string)
    {
        $this->string = $string;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlname()
    {
        return $this->urlname;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrlname($urlname)
    {
        $this->urlname = $urlname;

        return $this;
    }
}
