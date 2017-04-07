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



}
