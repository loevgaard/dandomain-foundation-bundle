<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Manager\SiteManager;
use Loevgaard\DandomainFoundationBundle\Manager\StateManager;
use Loevgaard\DandomainFoundationBundle\Model\Order;

class OrderSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Order';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderInterface';

    public function syncOrder($order, $flush = true)
    {
        $result = new Result();

        if (is_numeric($order)) {
            $order = \GuzzleHttp\json_decode($this->api->order->getOrder($order)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $order->id,
        ]);

        if (!$entity) {
            $entity = new $this->entityClassName();
        }

        // extract created date
        $created = \Dandomain\Api\jsonDateToDate($order->createdDate);
        $created->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
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
        /*
        // get payment method
        $paymentMethod = $this->objectManager->getRepository('EhandelCoreBundle:PaymentMethod')->findOneBy(array('externalId' => (int)$order->paymentInfo->id));
        if(!$paymentMethod) {
            $this->syncPaymentMethods();
        }

        // get shipping method
        $shippingMethod = $this->objectManager->getRepository('EhandelCoreBundle:ShippingMethod')->findOneBy(array('externalId' => (int)$order->shippingInfo->id));
        if(!$shippingMethod) {
            $this->syncShippingMethods();
        }
        */

        $entity
            ->setExternalId($order->id)
            //->setLanguage($language)
            //->setOrderState($orderState)
            ->setCurrencyCode($order->currencyCode)
            ->setTotalPrice($order->totalPrice)
            ->setVat($order->vatPct)
            ->setDate($created)
            ->setTrackingNumber($order->trackingNumber)
            ->setTransactionNumber($order->transactionNumber)
            //->setShippingMethod($shippingMethod)
            ->setShippingMethodId($order->shippingInfo->id)
            ->setShippingMethodName($order->shippingInfo->name)
            ->setShippingMethodFee($order->shippingInfo->fee)
            //->setPaymentMethod($paymentMethod)
            ->setPaymentMethodId($order->paymentInfo->id)
            ->setPaymentMethodName($order->paymentInfo->name)
            ->setPaymentMethodFee($order->paymentInfo->fee)
            ->setReferrer($order->referrer)
            ->setIpAddress($order->ip)
            ->setGiftCertificatePurchaseAmount($order->giftCertificateAmount)

            // customer fields
            ->setCustomerId($order->customerInfo->id)
            ->setCustomerName($order->customerInfo->attention)
            ->setCustomerAddress($order->customerInfo->address)
            ->setCustomerZipCode($order->customerInfo->zipCode)
            ->setCustomerCity($order->customerInfo->city)
            ->setCustomerCountry($order->customerInfo->country)
            ->setCustomerPhone($order->customerInfo->phone)
            ->setCustomerEmail($order->customerInfo->email)

            // delivery fields
            ->setDeliveryName($order->deliveryInfo->attention)
            ->setDeliveryAddress($order->deliveryInfo->address)
            ->setDeliveryZipCode($order->deliveryInfo->zipCode)
            ->setDeliveryCity($order->deliveryInfo->city)
            ->setDeliveryCountry($order->deliveryInfo->country)
            ->setDeliveryPhone($order->deliveryInfo->phone)
            ->setDeliveryEmail($order->deliveryInfo->email)
        ;

        //$entity->clearOrderLines();

        if ($syncProducts) {
            $productNumbers = array();
            foreach ($order->orderLines as $orderLine) {
                $productNumbers[] = $orderLine->productId;
            }

            //$this->syncProductsFromProductNumbers($productNumbers, false, $flush);
        }

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

        if ($flush) {
            $this->objectManager->flush();
        }

        return $result;
    }
}
