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
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

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
     * @var float
     *
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    protected $shippingMethodFee;

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
     * @ORM\Column(nullable=true, type="text")
     */
    protected $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $customerComment;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $giftCertificateAmount;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $giftCertificateNumber;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $incomplete;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $ip;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $modifiedDate;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $referenceNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $referrer;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField1;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField3;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField4;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField5;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $salesDiscount;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $totalPrice;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $totalWeight;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $trackingNumber;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $transactionNumber;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=5, scale=2)
     */
    protected $vatPct;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $vatRegNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $xmlParams;

    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * {@inheritdoc}
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomer(CustomerInterface $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerComment()
    {
        return $this->customerComment;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerComment($customerComment)
    {
        $this->customerComment = $customerComment;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * {@inheritdoc}
     */
    public function setDelivery(DeliveryInterface $delivery = null)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftCertificateAmount()
    {
        return $this->giftCertificateAmount;
    }

    /**
     * {@inheritdoc}
     */
    public function setGiftCertificateAmount($giftCertificateAmount)
    {
        $this->giftCertificateAmount = $giftCertificateAmount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftCertificateNumber()
    {
        return $this->giftCertificateNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setGiftCertificateNumber($giftCertificateNumber)
    {
        $this->giftCertificateNumber = $giftCertificateNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getIncomplete()
    {
        return $this->incomplete;
    }

    /**
     * {@inheritdoc}
     */
    public function setIncomplete($incomplete)
    {
        $this->incomplete = $incomplete;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * {@inheritdoc}
     */
    public function setInvoice(InvoiceInterface $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * {@inheritdoc}
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * {@inheritdoc}
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addOrderLine(OrderLineInterface $orderLine)
    {
        if (!($this->orderLines->contains($orderLine))) {
            $this->orderLines[] = $orderLine;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * {@inheritdoc}
     */
    public function removeOrderLine(OrderLineInterface $orderLine)
    {
        $this->orderLines->removeElement($orderLine);
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * {@inheritdoc}
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod = null)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * {@inheritdoc}
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedField1()
    {
        return $this->reservedField1;
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedField1($reservedField1)
    {
        $this->reservedField1 = $reservedField1;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedField2()
    {
        return $this->reservedField2;
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedField2($reservedField2)
    {
        $this->reservedField2 = $reservedField2;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedField3()
    {
        return $this->reservedField3;
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedField3($reservedField3)
    {
        $this->reservedField3 = $reservedField3;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedField4()
    {
        return $this->reservedField4;
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedField4($reservedField4)
    {
        $this->reservedField4 = $reservedField4;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedField5()
    {
        return $this->reservedField5;
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedField5($reservedField5)
    {
        $this->reservedField5 = $reservedField5;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalesDiscount()
    {
        return $this->salesDiscount;
    }

    /**
     * {@inheritdoc}
     */
    public function setSalesDiscount($salesDiscount)
    {
        $this->salesDiscount = $salesDiscount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingMethod(ShippingMethodInterface $shippingMethod = null)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingMethodFee()
    {
        return $this->shippingMethodFee;
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingMethodFee($shippingMethodFee)
    {
        $this->shippingMethodFee = $shippingMethodFee;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * {@inheritdoc}
     */
    public function setSite(SiteInterface $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function setState(StateInterface $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionNumber()
    {
        return $this->transactionNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setTransactionNumber($transactionNumber)
    {
        $this->transactionNumber = $transactionNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVatPct()
    {
        return $this->vatPct;
    }

    /**
     * {@inheritdoc}
     */
    public function setVatPct($vatPct)
    {
        $this->vatPct = $vatPct;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVatRegNumber()
    {
        return $this->vatRegNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setVatRegNumber($vatRegNumber)
    {
        $this->vatRegNumber = $vatRegNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getXmlParams()
    {
        return $this->xmlParams;
    }

    /**
     * {@inheritdoc}
     */
    public function setXmlParams($xmlParams)
    {
        $this->xmlParams = $xmlParams;

        return $this;
    }
}
