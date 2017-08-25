<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\Dandomain\Pay\PaymentRequest\PaymentLine as BasePaymentLine;

/**
 * @ORM\MappedSuperclass
 */
abstract class PaymentLine extends BasePaymentLine
{
    /**
     * @ORM\Column(type="string")
     */
    protected $productNumber;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="integer")
     */
    protected $vat;
}
