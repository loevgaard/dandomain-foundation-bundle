<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Order implements OrderInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var Delivery
     */
    protected $delivery;

    /**
     * @var Invoice
     */
    protected $invoice;

    /**
     * @var ArrayCollection
     */
    protected $orderLines;

    /**
     * @var PaymentMethod
     */
    protected $paymentMethod;

    /**
     * @var ShippingMethod
     */
    protected $shippingMethod;

    /**
     * @var Site
     */
    protected $site;

    /**
     * @var State
     */
    protected $state;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $customerComment;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $giftCertificateAmount;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $giftCertificateNumber;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $incomplete;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $ip;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $modifiedDate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $referenceNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $referrer;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField1;

    /**
     * @var int
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField3;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField4;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField5;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $salesDiscount;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $totalPrice;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $totalWeight;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $trackingNumber;

    /**
     * @var int
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $transactionNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vatPct;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vatRegNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $xmlParams;
}
