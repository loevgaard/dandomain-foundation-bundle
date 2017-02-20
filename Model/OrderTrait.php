<?php
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\ORM\Mapping as ORM;

trait OrderTrait {
    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $customerComment;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $currencyCode;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @ORM\ManyToOne(targetEntity="Site")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     * @var Site
     */
    protected $site;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $totalPrice;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $vatPercent;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $totalWeight;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $referrer;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $referenceNumber;

    /**
     * @var int
     * @ORM\Column(type="string", nullable=true)
     */
    protected $transactionNumber;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $trackingNumber;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $ip;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $salesDiscount;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $modified;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $modifiedDate;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $incomplete;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $vatRegistrationNumber;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField1;

    /**
     * @var int
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField2;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField3;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField4;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $reservedField5;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $giftCertificateAmount;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $giftCertificateNumber;

    // @todo should be a collection
    protected $orderLines;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $xmlParams;


    /*******************
     * Customer object *
     ******************/

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $customerId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerName;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customerAttention;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerAddress;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customerAddress2;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerZipCode;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerCity;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customerState;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerCountry;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerPhone;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customerFax;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $customerEmail;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customerEan;


    /*******************
     * Delivery object *
     ******************/

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryName;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryAttention;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryAddress;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryAddress2;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryZipCode;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryCity;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryState;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryCountry;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $deliveryCountryId;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryPhone;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryFax;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryEmail;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryEan;


    /**********************
     * Order State Object *
     *********************/

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     * @var State
     */
    protected $state;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $stateExclStatistics;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $stateId;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $stateIsDefault;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $stateName;


    /******************
     * Payment Object *
     *****************/

    /**
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     * @var PaymentMethod
     */
    protected $paymentMethod;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $paymentMethodId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $paymentMethodName;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $paymentMethodFee;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $paymentMethodFeeInclVat;


    /*******************
     * Shipping Object *
     ******************/

    /**
     * @ORM\ManyToOne(targetEntity="ShippingMethod")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     * @var ShippingMethod
     */
    protected $shippingMethod;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $shippingMethodId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $shippingMethodName;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $shippingMethodFee;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $shippingMethodFeeInclVat;


    /******************
     * Invoice Object *
     *****************/

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $invoiceDate;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $invoiceIsPaid;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $invoiceNumber;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $invoiceState;
}