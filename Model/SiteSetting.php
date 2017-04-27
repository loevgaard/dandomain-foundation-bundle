<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class SiteSetting implements SiteSettingInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField01;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField02;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField03;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField04;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField05;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField06;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField07;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField08;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField09;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customField10;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $expectedDeliveryTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $expectedDeliveryTimeNotInStock;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $giftCertificatePdfBackgroundImage;

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
    protected $hiddenForMobile;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $imageAltText;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isToplistHidden;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $keyWords;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $longDescription2;

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
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $pageTitle;
}
