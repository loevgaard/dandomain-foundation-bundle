<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class PaymentMethod implements PaymentMethodInterface {
    /**
     * @var int
     */
    protected $id;
}