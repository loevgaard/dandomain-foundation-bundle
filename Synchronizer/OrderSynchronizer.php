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
     * @var PaymentMethodSynchronizer
     */
    protected $paymentMethodSynchronizer;

    /**
     * @var ShippingMethodSynchronizer
     */
    protected $shippingMethodSynchronizer;

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

        if (!$entity) {
            $entity = new $this->entityClassName();
        }

/*
        // get site / language
        $siteManager = $this->objectManager->getRepository('Loevgaard\DandomainFoundationBundle\Model\Site');
        $site = $siteManager->findSiteByExternalId($order->siteId);
        if (!$site) {
            $this->getSiteSynchronizer()->syncSites();
            $site = $siteManager->findSiteByExternalId($order->siteId);

            if (!$site) {
                $result
                    ->addMessage('The site id '.$order->siteId.' does not exist anymore')
                    ->setError(true)
                ;

                return $result;
            }
        }

        // get order state
        $stateManager = $this->objectManager->getRepository('Loevgaard\DandomainFoundationBundle\Model\State');
        $state = $stateManager->findStateByExternalId($order->orderState->id);
        if (!$state) {
            $this->getStateSynchronizer()->syncStates();
            $state = $stateManager->findStateByExternalId($order->orderState->id);

            if (!$state) {
                $result
                    ->addMessage('The state id '.$order->orderState->id.' does not exist anymore')
                    ->setError(true)
                ;

                return $result;
            }
        }
*/
        $createdDate = \Dandomain\Api\jsonDateToDate($order->createdDate);
        $createdDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));

        if ($order->modifiedDate) {
            $modifiedDate = \Dandomain\Api\jsonDateToDate($order->modifiedDate);
            $modifiedDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $modifiedDate = null;
        }

        $entity
            ->setExternalId($order->id)
            ->setComment($order->comment)
            ->setCreatedDate($createdDate)
            ->setCurrencyCode($order->currencyCode)
            ->setCustomerComment($order->customerComment)
            ->setGiftCertificateAmount($order->giftCertificateAmount)
            ->setGiftCertificateNumber($order->giftCertificateNumber)
            ->setIncomplete($order->incomplete)
            ->setIp($order->ip)
            ->setModified($order->modified)
            ->setReferenceNumber($order->referenceNumber)
            ->setReferrer($order->referrer)
            ->setReservedField1($order->reservedField1)
            ->setReservedField2($order->reservedField2)
            ->setReservedField3($order->reservedField3)
            ->setReservedField4($order->reservedField4)
            ->setReservedField5($order->reservedField5)
            ->setSalesDiscount($order->salesDiscount)
            ->setTotalPrice($order->totalPrice)
            ->setTotalWeight($order->totalWeight)
            ->setTrackingNumber($order->trackingNumber)
            ->setTransactionNumber($order->transactionNumber)
            ->setVatPct($order->vatPct)
            ->setVatRegNumber($order->vatRegNumber)
            ->setXmlParams($order->xmlParams)
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

        $paymentMethod = $this->paymentMethodSynchronizer->syncPaymentMethod($order->paymentInfo, $flush, $entity->getPaymentMethod());
        $entity->setPaymentMethod($paymentMethod);

        $shippingMethod = $this->shippingMethodSynchronizer->syncShippingMethod($order->shippingInfo, $flush, $entity->getShippingMethod());
        $entity->setShippingMethod($shippingMethod);

/*
        if ($syncProducts) {
            $productNumbers = array();
            foreach ($order->orderLines as $orderLine) {
                $productNumbers[] = $orderLine->productId;
            }

            //$this->syncProductsFromProductNumbers($productNumbers, false, $flush);
        }
*/
        /*
        foreach($order->orderLines as $orderLine) {
            $product = $this->objectManager->getRepository('EhandelCoreBundle:Product')->findOneBy(array('productNumber' => (string)$orderLine->productId));

            $orderLineEntity = new OrderLine();
            $orderLineEntity->setAmount($orderLine->quantity)
                ->setProductNumber($orderLine->productId)
                ->setUnitPrice($orderLine->unitPrice)
                ->setTotalPrice($orderLine->totalPrice)
                ->setProductName($orderLine->productName)
                ->setVat((int)$orderLine->vatPct)
            ;
            if($product) {
                $orderLineEntity->setProduct($product)
                    ->setLocationNumber($product->getLocationNumber())
                    ->setLocationNumberSortColumn($product->getLocationNumberSortColumn())
                    ->setLocationNumberSortRow($product->getLocationNumberSortRow())
                    ->setImage($product->getImage())
                    ->setLeftInStock($product->getStock())
                ;
            }
            $entity->addOrderLine($orderLineEntity);
        }
        */

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
