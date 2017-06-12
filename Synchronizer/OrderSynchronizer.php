<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;

class OrderSynchronizer extends Synchronizer
{
    /**
     * @var CustomerSynchronizer
     */
    protected $customerSynchronizer;

    /**
     * @var DeliverySynchronizer
     */
    protected $deliverySynchronizer;

    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Order';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderInterface';

    /**
     * @var InvoiceSynchronizer
     */
    protected $invoiceSynchronizer;

    /**
     * @var OrderLineSynchronizer
     */
    protected $orderLineSynchronizer;

    /**
     * @var PaymentMethodSynchronizer
     */
    protected $paymentMethodSynchronizer;

    /**
     * @var ShippingMethodSynchronizer
     */
    protected $shippingMethodSynchronizer;

    /**
     * @var SiteSynchronizer
     */
    protected $siteSynchronizer;

    /**
     * @var StateSynchronizer
     */
    protected $stateSynchronizer;

    /**
     * Set CustomerSynchronizer.
     *
     * @param CustomerSynchronizer $customerSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setCustomerSynchronizer(CustomerSynchronizer $customerSynchronizer)
    {
        $this->customerSynchronizer = $customerSynchronizer;

        return $this;
    }

    /**
     * Set DeliverySynchronizer.
     *
     * @param DeliverySynchronizer $deliverySynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setDeliverySynchronizer(DeliverySynchronizer $deliverySynchronizer)
    {
        $this->deliverySynchronizer = $deliverySynchronizer;

        return $this;
    }

    /**
     * Set InvoiceSynchronizer.
     *
     * @param InvoiceSynchronizer $invoiceSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setInvoiceSynchronizer(InvoiceSynchronizer $invoiceSynchronizer)
    {
        $this->invoiceSynchronizer = $invoiceSynchronizer;

        return $this;
    }

    /**
     * Set OrderLineSynchronizer.
     *
     * @param OrderLineSynchronizer $orderLineSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setOrderLineSynchronizer(OrderLineSynchronizer $orderLineSynchronizer)
    {
        $this->orderLineSynchronizer = $orderLineSynchronizer;

        return $this;
    }

    /**
     * Set PaymentMethodSynchronizer.
     *
     * @param PaymentMethodSynchronizer $paymentMethodSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setPaymentMethodSynchronizer(PaymentMethodSynchronizer $paymentMethodSynchronizer)
    {
        $this->paymentMethodSynchronizer = $paymentMethodSynchronizer;

        return $this;
    }

    /**
     * Set ShippingMethodSynchronizer.
     *
     * @param ShippingMethodSynchronizer $shippingMethodSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setShippingMethodSynchronizer(ShippingMethodSynchronizer $shippingMethodSynchronizer)
    {
        $this->shippingMethodSynchronizer = $shippingMethodSynchronizer;

        return $this;
    }

    /**
     * Set SiteSynchronizer.
     *
     * @param SiteSynchronizer $siteSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setSiteSynchronizer(SiteSynchronizer $siteSynchronizer)
    {
        $this->siteSynchronizer = $siteSynchronizer;

        return $this;
    }

    /**
     * Set StateSynchronizer.
     *
     * @param StateSynchronizer $stateSynchronizer
     *
     * @return OrderSynchronizer
     */
    public function setStateSynchronizer(StateSynchronizer $stateSynchronizer)
    {
        $this->stateSynchronizer = $stateSynchronizer;

        return $this;
    }

    /**
     * Synchronizes Order.
     *
     * @param array $order
     * @param bool  $flush
     *
     * @return OrderInterface
     */
    public function syncOrder($order, $flush = true)
    {
        if (is_numeric($order)) {
            $order = \GuzzleHttp\json_decode($this->api->order->getOrder($order)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $order->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $createdDate = \Dandomain\Api\jsonDateToDate($order->createdDate);
        $createdDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));

        if ($order->modifiedDate) {
            $modifiedDate = \Dandomain\Api\jsonDateToDate($order->modifiedDate);
            $modifiedDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $modifiedDate = null;
        }

        /** @var OrderInterface $entity */
        $entity
            ->setExternalId($order->id ? : null)
            ->setComment($order->comment ? : null)
            ->setCreatedDate($createdDate)
            ->setCurrencyCode($order->currencyCode ? : null)
            ->setCustomerComment($order->customerComment ? : null)
            ->setGiftCertificateAmount($order->giftCertificateAmount)
            ->setGiftCertificateNumber($order->giftCertificateNumber ? : null)
            ->setIncomplete($order->incomplete)
            ->setIp($order->ip ? : null)
            ->setModified($order->modified)
            ->setReferenceNumber($order->referenceNumber ? : null)
            ->setReferrer($order->referrer ? : null)
            ->setReservedField1($order->reservedField1 ? : null)
            ->setReservedField2($order->reservedField2 ? : null)
            ->setReservedField3($order->reservedField3 ? : null)
            ->setReservedField4($order->reservedField4 ? : null)
            ->setReservedField5($order->reservedField5 ? : null)
            ->setSalesDiscount($order->salesDiscount)
            ->setTotalPrice($order->totalPrice)
            ->setTotalWeight($order->totalWeight)
            ->setTrackingNumber($order->trackingNumber ? : null)
            ->setTransactionNumber($order->transactionNumber ? : null)
            ->setVatPct($order->vatPct)
            ->setVatRegNumber($order->vatRegNumber ? : null)
            ->setXmlParams($order->xmlParams ? : null)
            ->setShippingMethodFee($order->shippingInfo->fee)
        ;

        if (null !== $modifiedDate) {
            $entity->setModifiedDate($modifiedDate);
        }

        $customer = $this->customerSynchronizer->syncCustomer($order->customerInfo, $flush);
        $entity->setCustomer($customer);

        $delivery = $this->deliverySynchronizer->syncDelivery($order->deliveryInfo, $flush, $entity->getDelivery());
        $entity->setDelivery($delivery);

        $invoice = $this->invoiceSynchronizer->syncInvoice($order->invoiceInfo, $flush, $entity->getInvoice());
        $entity->setInvoice($invoice);

        $paymentMethod = $this->paymentMethodSynchronizer->syncPaymentMethod($order->paymentInfo, $flush);
        $entity->setPaymentMethod($paymentMethod);

        $shippingMethod = $this->shippingMethodSynchronizer->syncShippingMethod($order->shippingInfo, $flush);
        $entity->setShippingMethod($shippingMethod);

        $site = $this->siteSynchronizer->syncSite($order->siteId, $flush);
        $entity->setSite($site);

        $state = $this->stateSynchronizer->syncState($order->orderState, $flush);
        $entity->setState($state);

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        if (is_array($order->orderLines)) {
            foreach ($order->orderLines as $orderLineData) {
                $orderLine = $this->orderLineSynchronizer->syncOrderLine($orderLineData, $entity, $flush);
                $entity->addOrderLine($orderLine);
            }
        }

        return $entity;
    }
}
