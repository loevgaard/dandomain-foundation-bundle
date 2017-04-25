<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductType implements ProductTypeInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $productTypeFields;

    /**
     * @var ArrayCollection
     */
    protected $productTypeFormulas;

    /**
     * @var ArrayCollection
     */
    protected $productTypeVats;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->productTypeFields = new ArrayCollection();
        $this->productTypeFormulas = new ArrayCollection();
        $this->productTypeVats = new ArrayCollection();
    }
}
