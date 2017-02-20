<?php
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="payment_methods")
 */
class PaymentMethod implements PaymentMethodInterface {
    use PaymentMethodTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}