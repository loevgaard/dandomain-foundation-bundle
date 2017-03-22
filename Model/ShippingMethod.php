<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ShippingMethod implements ShippingMethodInterface {
    /**
     * @var int
     */
    protected $id;
}