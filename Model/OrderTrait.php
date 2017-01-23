<?php
// @todo fix associations
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\ORM\Mapping as ORM;

trait OrderTrait {
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * @var int
     */
    protected $site;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $currencyCode;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $totalPrice = 0;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $vat;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $totalWeight = 0;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $referrer;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comments;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $customerComments;

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
    protected $ipAddress;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $discount = 0;

    /**
     * @var string
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
     * @var string
     */
    protected $paymentMethodFee;

    /**
     * @var string
     */
    protected $paymentMethodFeeInclVat;

    /**
     * @var string
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
     * @var string
     */
    protected $shippingMethodFee;

    /**
     * @var string
     */
    protected $shippingMethodFeeInclVat;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var string
     */
    protected $vatRegistrationNumber;

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
    protected $customerCompany;

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

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryName;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $deliveryCompany;

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
    protected $customField1;

    /**
     * @var int
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customField2;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customField3;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customField4;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $customField5;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    protected $giftCertificatePurchaseAmount = 0;

    // @todo misses a gift certificate number in the json result

    /**
     * @var string
     */
    protected $orderLines;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return OrderTrait
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param int $site
     * @return OrderTrait
     */
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return OrderTrait
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return OrderTrait
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
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
     * @return OrderTrait
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     * @return OrderTrait
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
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
     * @return OrderTrait
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return OrderTrait
     */
    public function setState($state)
    {
        $this->state = $state;
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
     * @return OrderTrait
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return OrderTrait
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerComments()
    {
        return $this->customerComments;
    }

    /**
     * @param string $customerComments
     * @return OrderTrait
     */
    public function setCustomerComments($customerComments)
    {
        $this->customerComments = $customerComments;
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return OrderTrait
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return OrderTrait
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setPaymentMethodName($paymentMethodName)
    {
        $this->paymentMethodName = $paymentMethodName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethodFee()
    {
        return $this->paymentMethodFee;
    }

    /**
     * @param string $paymentMethodFee
     * @return OrderTrait
     */
    public function setPaymentMethodFee($paymentMethodFee)
    {
        $this->paymentMethodFee = $paymentMethodFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethodFeeInclVat()
    {
        return $this->paymentMethodFeeInclVat;
    }

    /**
     * @param string $paymentMethodFeeInclVat
     * @return OrderTrait
     */
    public function setPaymentMethodFeeInclVat($paymentMethodFeeInclVat)
    {
        $this->paymentMethodFeeInclVat = $paymentMethodFeeInclVat;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @param string $shippingMethod
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setShippingMethodName($shippingMethodName)
    {
        $this->shippingMethodName = $shippingMethodName;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethodFee()
    {
        return $this->shippingMethodFee;
    }

    /**
     * @param string $shippingMethodFee
     * @return OrderTrait
     */
    public function setShippingMethodFee($shippingMethodFee)
    {
        $this->shippingMethodFee = $shippingMethodFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethodFeeInclVat()
    {
        return $this->shippingMethodFeeInclVat;
    }

    /**
     * @param string $shippingMethodFeeInclVat
     * @return OrderTrait
     */
    public function setShippingMethodFeeInclVat($shippingMethodFeeInclVat)
    {
        $this->shippingMethodFeeInclVat = $shippingMethodFeeInclVat;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     * @return OrderTrait
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
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
     * @return OrderTrait
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
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
     * @return OrderTrait
     */
    public function setVatRegistrationNumber($vatRegistrationNumber)
    {
        $this->vatRegistrationNumber = $vatRegistrationNumber;
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
     * @return OrderTrait
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCompany()
    {
        return $this->customerCompany;
    }

    /**
     * @param string $customerCompany
     * @return OrderTrait
     */
    public function setCustomerCompany($customerCompany)
    {
        $this->customerCompany = $customerCompany;
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setDeliveryName($deliveryName)
    {
        $this->deliveryName = $deliveryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    /**
     * @param string $deliveryCompany
     * @return OrderTrait
     */
    public function setDeliveryCompany($deliveryCompany)
    {
        $this->deliveryCompany = $deliveryCompany;
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setDeliveryCountry($deliveryCountry)
    {
        $this->deliveryCountry = $deliveryCountry;
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
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
     * @return OrderTrait
     */
    public function setDeliveryEan($deliveryEan)
    {
        $this->deliveryEan = $deliveryEan;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomField1()
    {
        return $this->customField1;
    }

    /**
     * @param string $customField1
     * @return OrderTrait
     */
    public function setCustomField1($customField1)
    {
        $this->customField1 = $customField1;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomField2()
    {
        return $this->customField2;
    }

    /**
     * @param int $customField2
     * @return OrderTrait
     */
    public function setCustomField2($customField2)
    {
        $this->customField2 = $customField2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomField3()
    {
        return $this->customField3;
    }

    /**
     * @param string $customField3
     * @return OrderTrait
     */
    public function setCustomField3($customField3)
    {
        $this->customField3 = $customField3;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomField4()
    {
        return $this->customField4;
    }

    /**
     * @param string $customField4
     * @return OrderTrait
     */
    public function setCustomField4($customField4)
    {
        $this->customField4 = $customField4;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomField5()
    {
        return $this->customField5;
    }

    /**
     * @param string $customField5
     * @return OrderTrait
     */
    public function setCustomField5($customField5)
    {
        $this->customField5 = $customField5;
        return $this;
    }

    /**
     * @return float
     */
    public function getGiftCertificatePurchaseAmount()
    {
        return $this->giftCertificatePurchaseAmount;
    }

    /**
     * @param float $giftCertificatePurchaseAmount
     * @return OrderTrait
     */
    public function setGiftCertificatePurchaseAmount($giftCertificatePurchaseAmount)
    {
        $this->giftCertificatePurchaseAmount = $giftCertificatePurchaseAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @param string $orderLines
     * @return OrderTrait
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;
        return $this;
    }
}