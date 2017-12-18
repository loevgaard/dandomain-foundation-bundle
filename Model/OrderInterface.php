<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

interface OrderInterface
{
    /**
     * @return string
     */
    public function getComment();

    /**
     * @param string $comment
     *
     * @return OrderInterface
     */
    public function setComment($comment);

    /**
     * @return \DateTime
     */
    public function getCreatedDate();

    /**
     * @param \DateTime $createdDate
     *
     * @return OrderInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return string
     */
    public function getCurrencyCode();

    /**
     * @param string $currencyCode
     *
     * @return OrderInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return CustomerInterface
     */
    public function getCustomer();

    /**
     * @param CustomerInterface $customer
     *
     * @return OrderInterface
     */
    public function setCustomer(CustomerInterface $customer = null);

    /**
     * @return string
     */
    public function getCustomerComment();

    /**
     * @param string $customerComment
     *
     * @return OrderInterface
     */
    public function setCustomerComment($customerComment);

    /**
     * @return DeliveryInterface
     */
    public function getDelivery();

    /**
     * @param DeliveryInterface $delivery
     *
     * @return OrderInterface
     */
    public function setDelivery(DeliveryInterface $delivery = null);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return OrderInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getGiftCertificateAmount();

    /**
     * @param string $giftCertificateAmount
     *
     * @return OrderInterface
     */
    public function setGiftCertificateAmount($giftCertificateAmount);

    /**
     * @return string
     */
    public function getGiftCertificateNumber();

    /**
     * @param string $giftCertificateNumber
     *
     * @return OrderInterface
     */
    public function setGiftCertificateNumber($giftCertificateNumber);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function getIncomplete();

    /**
     * @param bool $incomplete
     *
     * @return OrderInterface
     */
    public function setIncomplete($incomplete);

    /**
     * @return InvoiceInterface
     */
    public function getInvoice();

    /**
     * @param InvoiceInterface $invoice
     *
     * @return OrderInterface
     */
    public function setInvoice(InvoiceInterface $invoice = null);

    /**
     * @return string
     */
    public function getIp();

    /**
     * @param string $ip
     *
     * @return OrderInterface
     */
    public function setIp($ip);

    /**
     * @return bool
     */
    public function getModified();

    /**
     * @param bool $modified
     *
     * @return OrderInterface
     */
    public function setModified($modified);

    /**
     * @return \DateTime
     */
    public function getModifiedDate();

    /**
     * @param \DateTime $modifiedDate
     *
     * @return OrderInterface
     */
    public function setModifiedDate($modifiedDate);

    /**
     * Add orderLine.
     *
     * @param OrderLineInterface $orderLine
     *
     * @return OrderInterface
     */
    public function addOrderLine(OrderLineInterface $orderLine);

    /**
     * Clears the order lines on this order
     *
     * @return void
     */
    public function clearOrderLines();

    /**
     * @return ArrayCollection|OrderLineInterface[]
     */
    public function getOrderLines();

    /**
     * Remove orderLine.
     *
     * @param OrderLineInterface $orderLine
     */
    public function removeOrderLine(OrderLineInterface $orderLine);

    /**
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod();

    /**
     * @param PaymentMethodInterface $paymentMethod
     *
     * @return OrderInterface
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod = null);

    /**
     * @return string
     */
    public function getReferenceNumber();

    /**
     * @param string $referenceNumber
     *
     * @return OrderInterface
     */
    public function setReferenceNumber($referenceNumber);

    /**
     * @return string
     */
    public function getReferrer();

    /**
     * @param string $referrer
     *
     * @return OrderInterface
     */
    public function setReferrer($referrer);

    /**
     * @return string
     */
    public function getReservedField1();

    /**
     * @param string $reservedField1
     *
     * @return OrderInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * @return string
     */
    public function getReservedField2();

    /**
     * @param string $reservedField2
     *
     * @return OrderInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * @return string
     */
    public function getReservedField3();

    /**
     * @param string $reservedField3
     *
     * @return OrderInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * @return string
     */
    public function getReservedField4();

    /**
     * @param string $reservedField4
     *
     * @return OrderInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * @return string
     */
    public function getReservedField5();

    /**
     * @param string $reservedField5
     *
     * @return OrderInterface
     */
    public function setReservedField5($reservedField5);

    /**
     * @return string
     */
    public function getSalesDiscount();

    /**
     * @param string $salesDiscount
     *
     * @return OrderInterface
     */
    public function setSalesDiscount($salesDiscount);

    /**
     * @return ShippingMethodInterface
     */
    public function getShippingMethod();

    /**
     * @param ShippingMethodInterface $shippingMethod
     *
     * @return OrderInterface
     */
    public function setShippingMethod(ShippingMethodInterface $shippingMethod = null);

    /**
     * @return float
     */
    public function getShippingMethodFee();

    /**
     * @param float $shippingMethodFee
     * @return OrderInterface
     */
    public function setShippingMethodFee($shippingMethodFee);

    /**
     * @return SiteInterface
     */
    public function getSite();

    /**
     * @param SiteInterface $site
     *
     * @return OrderInterface
     */
    public function setSite(SiteInterface $site = null);

    /**
     * @return StateInterface
     */
    public function getState();

    /**
     * @param StateInterface $state
     *
     * @return OrderInterface
     */
    public function setState(StateInterface $state = null);

    /**
     * @return string
     */
    public function getTotalPrice();

    /**
     * @param string $totalPrice
     *
     * @return OrderInterface
     */
    public function setTotalPrice($totalPrice);

    /**
     * @return string
     */
    public function getTotalWeight();

    /**
     * @param string $totalWeight
     *
     * @return OrderInterface
     */
    public function setTotalWeight($totalWeight);

    /**
     * @return string
     */
    public function getTrackingNumber();

    /**
     * @param string $trackingNumber
     *
     * @return OrderInterface
     */
    public function setTrackingNumber($trackingNumber);

    /**
     * @return string
     */
    public function getTransactionNumber();

    /**
     * @param string $transactionNumber
     *
     * @return OrderInterface
     */
    public function setTransactionNumber($transactionNumber);

    /**
     * @return float
     */
    public function getVatPct();

    /**
     * @param float $vatPct
     *
     * @return OrderInterface
     */
    public function setVatPct($vatPct);

    /**
     * @return string
     */
    public function getVatRegNumber();

    /**
     * @param string $vatRegNumber
     *
     * @return OrderInterface
     */
    public function setVatRegNumber($vatRegNumber);

    /**
     * @return string
     */
    public function getXmlParams();

    /**
     * @param string $xmlParams
     *
     * @return OrderInterface
     */
    public function setXmlParams($xmlParams);

    /**
     * @return float
     */
    public function getPaymentMethodFee();
    /**
     * @param float $paymentMethodFee
     * @return Order
     */
    public function setPaymentMethodFee($paymentMethodFee);
}
