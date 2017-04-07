<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Product implements ProductInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $categories;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $barCodeNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $comments;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $costPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $created;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $createdBy;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $defaultCategoryId;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $disabledVariantIdList;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $disabledVariants;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $edbPriserProductNumber;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $fileSaleLink;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $googleFeedCategory;


}
