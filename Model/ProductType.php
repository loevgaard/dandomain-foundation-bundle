<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Period implements PeriodInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $disabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $endDate;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $externalId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $startDate;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $title;
}
