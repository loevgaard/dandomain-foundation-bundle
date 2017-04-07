<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Price implements PriceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Period
     */
    protected $period;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $amount;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $avance;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $currencyCode;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $isoCode;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $periodId;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $specialOfferPrice;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $unitPrice;
}
