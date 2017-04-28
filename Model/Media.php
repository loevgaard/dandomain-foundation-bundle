<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Media implements MediaInterface
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
    protected $height;

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
    protected $sortorder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnail;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailheight;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailwidth;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $width;
}
