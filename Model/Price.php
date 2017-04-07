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


}
