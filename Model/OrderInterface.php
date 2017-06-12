<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface OrderInterface
{
    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment();

    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return OrderInterface
     */
    public function setComment($comment);

    /**
     * Get createdDate.
     *
     * @return \DateTime
     */
    public function getCreatedDate();

    /**
     * Set createdDate.
     *
     * @param \DateTime $createdDate
     *
     * @return OrderInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * Get currencyCode.
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Set currencyCode.
     *
     * @param string $currencyCode
     *
     * @return OrderInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Get customer.
     *
     * @return CustomerInterface
     */
    public function getCustomer();

    /**
     * Set customer.
     *
     * @param CustomerInterface $customer
     *
     * @return OrderInterface
     */
    public function setCustomer(CustomerInterface $customer = null);

    /**
     * Get customerComment.
     *
     * @return string
     */
    public function getCustomerComment();

    /**
     * Set customerComment.
     *
     * @param string $customerComment
     *
     * @return OrderInterface
     */
    public function setCustomerComment($customerComment);

    /**
     * Get delivery.
     *
     * @return DeliveryInterface
     */
    public function getDelivery();

    /**
     * Set delivery.
     *
     * @param DeliveryInterface $delivery
     *
     * @return OrderInterface
     */
    public function setDelivery(DeliveryInterface $delivery = null);

    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return OrderInterface
     */
    public function setExternalId($externalId);

    /**
     * Get giftCertificateAmount.
     *
     * @return string
     */
    public function getGiftCertificateAmount();

    /**
     * Set giftCertificateAmount.
     *
     * @param string $giftCertificateAmount
     *
     * @return OrderInterface
     */
    public function setGiftCertificateAmount($giftCertificateAmount);

    /**
     * Get giftCertificateNumber.
     *
     * @return string
     */
    public function getGiftCertificateNumber();

    /**
     * Set giftCertificateNumber.
     *
     * @param string $giftCertificateNumber
     *
     * @return OrderInterface
     */
    public function setGiftCertificateNumber($giftCertificateNumber);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get incomplete.
     *
     * @return bool
     */
    public function getIncomplete();

    /**
     * Set incomplete.
     *
     * @param bool $incomplete
     *
     * @return OrderInterface
     */
    public function setIncomplete($incomplete);

    /**
     * Get invoice.
     *
     * @return InvoiceInterface
     */
    public function getInvoice();

    /**
     * Set invoice.
     *
     * @param InvoiceInterface $invoice
     *
     * @return OrderInterface
     */
    public function setInvoice(InvoiceInterface $invoice = null);

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp();

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return OrderInterface
     */
    public function setIp($ip);

    /**
     * Get modified.
     *
     * @return bool
     */
    public function getModified();

    /**
     * Set modified.
     *
     * @param bool $modified
     *
     * @return OrderInterface
     */
    public function setModified($modified);

    /**
     * Get modifiedDate.
     *
     * @return \DateTime
     */
    public function getModifiedDate();

    /**
     * Set modifiedDate.
     *
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
     * Get orderLines.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderLines();

    /**
     * Remove orderLine.
     *
     * @param OrderLineInterface $orderLine
     */
    public function removeOrderLine(OrderLineInterface $orderLine);

    /**
     * Get paymentMethod.
     *
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod();

    /**
     * Set paymentMethod.
     *
     * @param PaymentMethodInterface $paymentMethod
     *
     * @return OrderInterface
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod = null);

    /**
     * Get referenceNumber.
     *
     * @return string
     */
    public function getReferenceNumber();

    /**
     * Set referenceNumber.
     *
     * @param string $referenceNumber
     *
     * @return OrderInterface
     */
    public function setReferenceNumber($referenceNumber);

    /**
     * Get referrer.
     *
     * @return string
     */
    public function getReferrer();

    /**
     * Set referrer.
     *
     * @param string $referrer
     *
     * @return OrderInterface
     */
    public function setReferrer($referrer);

    /**
     * Get reservedField1.
     *
     * @return string
     */
    public function getReservedField1();

    /**
     * Set reservedField1.
     *
     * @param string $reservedField1
     *
     * @return OrderInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * Get reservedField2.
     *
     * @return string
     */
    public function getReservedField2();

    /**
     * Set reservedField2.
     *
     * @param string $reservedField2
     *
     * @return OrderInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * Get reservedField3.
     *
     * @return string
     */
    public function getReservedField3();

    /**
     * Set reservedField3.
     *
     * @param string $reservedField3
     *
     * @return OrderInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * Get reservedField4.
     *
     * @return string
     */
    public function getReservedField4();

    /**
     * Set reservedField4.
     *
     * @param string $reservedField4
     *
     * @return OrderInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * Get reservedField5.
     *
     * @return string
     */
    public function getReservedField5();

    /**
     * Set reservedField5.
     *
     * @param string $reservedField5
     *
     * @return OrderInterface
     */
    public function setReservedField5($reservedField5);

    /**
     * Get salesDiscount.
     *
     * @return string
     */
    public function getSalesDiscount();

    /**
     * Set salesDiscount.
     *
     * @param string $salesDiscount
     *
     * @return OrderInterface
     */
    public function setSalesDiscount($salesDiscount);

    /**
     * Get shippingMethod.
     *
     * @return ShippingMethodInterface
     */
    public function getShippingMethod();

    /**
     * Set shippingMethod.
     *
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
     * Get site.
     *
     * @return SiteInterface
     */
    public function getSite();

    /**
     * Set site.
     *
     * @param SiteInterface $site
     *
     * @return OrderInterface
     */
    public function setSite(SiteInterface $site = null);

    /**
     * Get state.
     *
     * @return StateInterface
     */
    public function getState();

    /**
     * Set state.
     *
     * @param StateInterface $state
     *
     * @return OrderInterface
     */
    public function setState(StateInterface $state = null);

    /**
     * Get totalPrice.
     *
     * @return string
     */
    public function getTotalPrice();

    /**
     * Set totalPrice.
     *
     * @param string $totalPrice
     *
     * @return OrderInterface
     */
    public function setTotalPrice($totalPrice);

    /**
     * Get totalWeight.
     *
     * @return string
     */
    public function getTotalWeight();

    /**
     * Set totalWeight.
     *
     * @param string $totalWeight
     *
     * @return OrderInterface
     */
    public function setTotalWeight($totalWeight);

    /**
     * Get trackingNumber.
     *
     * @return string
     */
    public function getTrackingNumber();

    /**
     * Set trackingNumber.
     *
     * @param string $trackingNumber
     *
     * @return OrderInterface
     */
    public function setTrackingNumber($trackingNumber);

    /**
     * Get transactionNumber.
     *
     * @return string
     */
    public function getTransactionNumber();

    /**
     * Set transactionNumber.
     *
     * @param string $transactionNumber
     *
     * @return OrderInterface
     */
    public function setTransactionNumber($transactionNumber);

    /**
     * Get vatPct.
     *
     * @return string
     */
    public function getVatPct();

    /**
     * Set vatPct.
     *
     * @param string $vatPct
     *
     * @return OrderInterface
     */
    public function setVatPct($vatPct);

    /**
     * Get vatRegNumber.
     *
     * @return string
     */
    public function getVatRegNumber();

    /**
     * Set vatRegNumber.
     *
     * @param string $vatRegNumber
     *
     * @return OrderInterface
     */
    public function setVatRegNumber($vatRegNumber);

    /**
     * Get xmlParams.
     *
     * @return string
     */
    public function getXmlParams();

    /**
     * Set xmlParams.
     *
     * @param string $xmlParams
     *
     * @return OrderInterface
     */
    public function setXmlParams($xmlParams);
}
