<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductTypeVat implements ProductTypeVatInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $productTypes;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $country;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $countryId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $vatPct;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->productTypes = new ArrayCollection();
    }
}
