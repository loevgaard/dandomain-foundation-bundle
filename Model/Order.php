<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

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
     *
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
     * @var Customer
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    protected $customer;

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

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryCvr;

    /**********************
     * Order State Object *
     *********************/

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     *
     * @var State
     */
    protected $state;

    /******************
     * Payment Object *
     *****************/

    /**
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     *
     * @var PaymentMethod
     */
    protected $paymentMethod;

    /*******************
     * Shipping Object *
     ******************/

    /**
     * @ORM\ManyToOne(targetEntity="ShippingMethod")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     *
     * @var ShippingMethod
     */
    protected $shippingMethod;

    /******************
     * Invoice Object *
     *****************/
    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $invoiceCreditNoteNumber;

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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerComment()
    {
        return $this->customerComment;
    }

    /**
     * @param string $customerComment
     *
     * @return Order
     */
    public function setCustomerComment($customerComment)
    {
        $this->customerComment = $customerComment;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     *
     * @return Order
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     *
     * @return Order
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param int $externalId
     *
     * @return Order
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param Site $site
     *
     * @return Order
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     *
     * @return Order
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getVatPercent()
    {
        return $this->vatPercent;
    }

    /**
     * @param float $vatPercent
     *
     * @return Order
     */
    public function setVatPercent($vatPercent)
    {
        $this->vatPercent = $vatPercent;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param float $totalWeight
     *
     * @return Order
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param string $referrer
     *
     * @return Order
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param string $referenceNumber
     *
     * @return Order
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * @param int $transactionNumber
     *
     * @return Order
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param string $trackingNumber
     *
     * @return Order
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     *
     * @return Order
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return float
     */
    public function getSalesDiscount()
    {
        return $this->salesDiscount;
    }

    /**
     * @param float $salesDiscount
     *
     * @return Order
     */
    public function setSalesDiscount($salesDiscount)
    {
        $this->salesDiscount = $salesDiscount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isModified()
    {
        return $this->modified;
    }

    /**
     * @param bool $modified
     *
     * @return Order
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param \DateTime $modifiedDate
     *
     * @return Order
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIncomplete()
    {
        return $this->incomplete;
    }

    /**
     * @param bool $incomplete
     *
     * @return Order
     */
    public function setIncomplete($incomplete)
    {
        $this->incomplete = $incomplete;

        return $this;
    }

    /**
     * @return string
     */
    public function getVatRegistrationNumber()
    {
        return $this->vatRegistrationNumber;
    }

    /**
     * @param string $vatRegistrationNumber
     *
     * @return Order
     */
    public function setVatRegistrationNumber($vatRegistrationNumber)
    {
        $this->vatRegistrationNumber = $vatRegistrationNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getReservedField1()
    {
        return $this->reservedField1;
    }

    /**
     * @param string $reservedField1
     *
     * @return Order
     */
    public function setReservedField1($reservedField1)
    {
        $this->reservedField1 = $reservedField1;

        return $this;
    }

    /**
     * @return int
     */
    public function getReservedField2()
    {
        return $this->reservedField2;
    }

    /**
     * @param int $reservedField2
     *
     * @return Order
     */
    public function setReservedField2($reservedField2)
    {
        $this->reservedField2 = $reservedField2;

        return $this;
    }

    /**
     * @return string
     */
    public function getReservedField3()
    {
        return $this->reservedField3;
    }

    /**
     * @param string $reservedField3
     *
     * @return Order
     */
    public function setReservedField3($reservedField3)
    {
        $this->reservedField3 = $reservedField3;

        return $this;
    }

    /**
     * @return string
     */
    public function getReservedField4()
    {
        return $this->reservedField4;
    }

    /**
     * @param string $reservedField4
     *
     * @return Order
     */
    public function setReservedField4($reservedField4)
    {
        $this->reservedField4 = $reservedField4;

        return $this;
    }

    /**
     * @return string
     */
    public function getReservedField5()
    {
        return $this->reservedField5;
    }

    /**
     * @param string $reservedField5
     *
     * @return Order
     */
    public function setReservedField5($reservedField5)
    {
        $this->reservedField5 = $reservedField5;

        return $this;
    }

    /**
     * @return float
     */
    public function getGiftCertificateAmount()
    {
        return $this->giftCertificateAmount;
    }

    /**
     * @param float $giftCertificateAmount
     *
     * @return Order
     */
    public function setGiftCertificateAmount($giftCertificateAmount)
    {
        $this->giftCertificateAmount = $giftCertificateAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getGiftCertificateNumber()
    {
        return $this->giftCertificateNumber;
    }

    /**
     * @param int $giftCertificateNumber
     *
     * @return Order
     */
    public function setGiftCertificateNumber($giftCertificateNumber)
    {
        $this->giftCertificateNumber = $giftCertificateNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @param mixed $orderLines
     *
     * @return Order
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    /**
     * @return string
     */
    public function getXmlParams()
    {
        return $this->xmlParams;
    }

    /**
     * @param string $xmlParams
     *
     * @return Order
     */
    public function setXmlParams($xmlParams)
    {
        $this->xmlParams = $xmlParams;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     *
     * @return Order
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     *
     * @return Order
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAttention()
    {
        return $this->customerAttention;
    }

    /**
     * @param string $customerAttention
     *
     * @return Order
     */
    public function setCustomerAttention($customerAttention)
    {
        $this->customerAttention = $customerAttention;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }

    /**
     * @param string $customerAddress
     *
     * @return Order
     */
    public function setCustomerAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAddress2()
    {
        return $this->customerAddress2;
    }

    /**
     * @param string $customerAddress2
     *
     * @return Order
     */
    public function setCustomerAddress2($customerAddress2)
    {
        $this->customerAddress2 = $customerAddress2;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerZipCode()
    {
        return $this->customerZipCode;
    }

    /**
     * @param string $customerZipCode
     *
     * @return Order
     */
    public function setCustomerZipCode($customerZipCode)
    {
        $this->customerZipCode = $customerZipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCity()
    {
        return $this->customerCity;
    }

    /**
     * @param string $customerCity
     *
     * @return Order
     */
    public function setCustomerCity($customerCity)
    {
        $this->customerCity = $customerCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerState()
    {
        return $this->customerState;
    }

    /**
     * @param string $customerState
     *
     * @return Order
     */
    public function setCustomerState($customerState)
    {
        $this->customerState = $customerState;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCountry()
    {
        return $this->customerCountry;
    }

    /**
     * @param string $customerCountry
     *
     * @return Order
     */
    public function setCustomerCountry($customerCountry)
    {
        $this->customerCountry = $customerCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * @param string $customerPhone
     *
     * @return Order
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFax()
    {
        return $this->customerFax;
    }

    /**
     * @param string $customerFax
     *
     * @return Order
     */
    public function setCustomerFax($customerFax)
    {
        $this->customerFax = $customerFax;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     *
     * @return Order
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEan()
    {
        return $this->customerEan;
    }

    /**
     * @param string $customerEan
     *
     * @return Order
     */
    public function setCustomerEan($customerEan)
    {
        $this->customerEan = $customerEan;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    /**
     * @param string $deliveryName
     *
     * @return Order
     */
    public function setDeliveryName($deliveryName)
    {
        $this->deliveryName = $deliveryName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAttention()
    {
        return $this->deliveryAttention;
    }

    /**
     * @param string $deliveryAttention
     *
     * @return Order
     */
    public function setDeliveryAttention($deliveryAttention)
    {
        $this->deliveryAttention = $deliveryAttention;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     *
     * @return Order
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress2()
    {
        return $this->deliveryAddress2;
    }

    /**
     * @param string $deliveryAddress2
     *
     * @return Order
     */
    public function setDeliveryAddress2($deliveryAddress2)
    {
        $this->deliveryAddress2 = $deliveryAddress2;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryZipCode()
    {
        return $this->deliveryZipCode;
    }

    /**
     * @param string $deliveryZipCode
     *
     * @return Order
     */
    public function setDeliveryZipCode($deliveryZipCode)
    {
        $this->deliveryZipCode = $deliveryZipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    /**
     * @param string $deliveryCity
     *
     * @return Order
     */
    public function setDeliveryCity($deliveryCity)
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryState()
    {
        return $this->deliveryState;
    }

    /**
     * @param string $deliveryState
     *
     * @return Order
     */
    public function setDeliveryState($deliveryState)
    {
        $this->deliveryState = $deliveryState;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    /**
     * @param string $deliveryCountry
     *
     * @return Order
     */
    public function setDeliveryCountry($deliveryCountry)
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    /**
     * @return int
     */
    public function getDeliveryCountryId()
    {
        return $this->deliveryCountryId;
    }

    /**
     * @param int $deliveryCountryId
     *
     * @return Order
     */
    public function setDeliveryCountryId($deliveryCountryId)
    {
        $this->deliveryCountryId = $deliveryCountryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryPhone()
    {
        return $this->deliveryPhone;
    }

    /**
     * @param string $deliveryPhone
     *
     * @return Order
     */
    public function setDeliveryPhone($deliveryPhone)
    {
        $this->deliveryPhone = $deliveryPhone;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryFax()
    {
        return $this->deliveryFax;
    }

    /**
     * @param string $deliveryFax
     *
     * @return Order
     */
    public function setDeliveryFax($deliveryFax)
    {
        $this->deliveryFax = $deliveryFax;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryEmail()
    {
        return $this->deliveryEmail;
    }

    /**
     * @param string $deliveryEmail
     *
     * @return Order
     */
    public function setDeliveryEmail($deliveryEmail)
    {
        $this->deliveryEmail = $deliveryEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryEan()
    {
        return $this->deliveryEan;
    }

    /**
     * @param string $deliveryEan
     *
     * @return Order
     */
    public function setDeliveryEan($deliveryEan)
    {
        $this->deliveryEan = $deliveryEan;

        return $this;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param State $state
     *
     * @return Order
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return bool
     */
    public function isStateExclStatistics()
    {
        return $this->stateExclStatistics;
    }

    /**
     * @param bool $stateExclStatistics
     *
     * @return Order
     */
    public function setStateExclStatistics($stateExclStatistics)
    {
        $this->stateExclStatistics = $stateExclStatistics;

        return $this;
    }

    /**
     * @return int
     */
    public function getStateId()
    {
        return $this->stateId;
    }

    /**
     * @param int $stateId
     *
     * @return Order
     */
    public function setStateId($stateId)
    {
        $this->stateId = $stateId;

        return $this;
    }

    /**
     * @return bool
     */
    public function isStateIsDefault()
    {
        return $this->stateIsDefault;
    }

    /**
     * @param bool $stateIsDefault
     *
     * @return Order
     */
    public function setStateIsDefault($stateIsDefault)
    {
        $this->stateIsDefault = $stateIsDefault;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * @param string $stateName
     *
     * @return Order
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * @return PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param PaymentMethod $paymentMethod
     *
     * @return Order
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentMethodId()
    {
        return $this->paymentMethodId;
    }

    /**
     * @param int $paymentMethodId
     *
     * @return Order
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethodName()
    {
        return $this->paymentMethodName;
    }

    /**
     * @param string $paymentMethodName
     *
     * @return Order
     */
    public function setPaymentMethodName($paymentMethodName)
    {
        $this->paymentMethodName = $paymentMethodName;

        return $this;
    }

    /**
     * @return float
     */
    public function getPaymentMethodFee()
    {
        return $this->paymentMethodFee;
    }

    /**
     * @param float $paymentMethodFee
     *
     * @return Order
     */
    public function setPaymentMethodFee($paymentMethodFee)
    {
        $this->paymentMethodFee = $paymentMethodFee;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaymentMethodFeeInclVat()
    {
        return $this->paymentMethodFeeInclVat;
    }

    /**
     * @param bool $paymentMethodFeeInclVat
     *
     * @return Order
     */
    public function setPaymentMethodFeeInclVat($paymentMethodFeeInclVat)
    {
        $this->paymentMethodFeeInclVat = $paymentMethodFeeInclVat;

        return $this;
    }

    /**
     * @return ShippingMethod
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @param ShippingMethod $shippingMethod
     *
     * @return Order
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * @return int
     */
    public function getShippingMethodId()
    {
        return $this->shippingMethodId;
    }

    /**
     * @param int $shippingMethodId
     *
     * @return Order
     */
    public function setShippingMethodId($shippingMethodId)
    {
        $this->shippingMethodId = $shippingMethodId;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethodName()
    {
        return $this->shippingMethodName;
    }

    /**
     * @param string $shippingMethodName
     *
     * @return Order
     */
    public function setShippingMethodName($shippingMethodName)
    {
        $this->shippingMethodName = $shippingMethodName;

        return $this;
    }

    /**
     * @return float
     */
    public function getShippingMethodFee()
    {
        return $this->shippingMethodFee;
    }

    /**
     * @param float $shippingMethodFee
     *
     * @return Order
     */
    public function setShippingMethodFee($shippingMethodFee)
    {
        $this->shippingMethodFee = $shippingMethodFee;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShippingMethodFeeInclVat()
    {
        return $this->shippingMethodFeeInclVat;
    }

    /**
     * @param bool $shippingMethodFeeInclVat
     *
     * @return Order
     */
    public function setShippingMethodFeeInclVat($shippingMethodFeeInclVat)
    {
        $this->shippingMethodFeeInclVat = $shippingMethodFeeInclVat;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param \DateTime $invoiceDate
     *
     * @return Order
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInvoiceIsPaid()
    {
        return $this->invoiceIsPaid;
    }

    /**
     * @param bool $invoiceIsPaid
     *
     * @return Order
     */
    public function setInvoiceIsPaid($invoiceIsPaid)
    {
        $this->invoiceIsPaid = $invoiceIsPaid;

        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param int $invoiceNumber
     *
     * @return Order
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceState()
    {
        return $this->invoiceState;
    }

    /**
     * @param string $invoiceState
     *
     * @return Order
     */
    public function setInvoiceState($invoiceState)
    {
        $this->invoiceState = $invoiceState;

        return $this;
    }
}
