<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

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
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $number;

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
    protected $urlname;
}
