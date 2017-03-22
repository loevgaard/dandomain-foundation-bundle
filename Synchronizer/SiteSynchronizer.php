<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\Site;

class SiteSynchronizer extends Synchronizer
{
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\SiteInterface';

    /** @var string */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Site';

    public function syncSites($flush = true)
    {
        $sites = \GuzzleHttp\json_decode($this->api->settings->getSites()->getBody()->getContents());

        foreach ($sites as $site) {
            /** @var Site $entity */
            $entity = $this->objectManager->getRepository($this->entityClassName)->findSiteById([
                'externalId' => $site->id,
            ]);

            if (!$entity) {
                $entity = new $this->entityClassName();
                $entity->setExternalId($site->id);
                $this->objectManager->persist($entity);
            }

            $entity
                ->setCountryId($site->countryId)
                ->setCurrencyCode($site->currencyCode)
                ;

            if ($flush) {
                $this->objectManager->flush();
            }
        }

        // extract created date
        $created = \Dandomain\Api\jsonDateToDate($order['createdDate']);
        $created->setTimezone(new \DateTimeZone('Europe/Copenhagen'));

        /*
        // get language/site
        $language = $this->objectManager->getRepository('EhandelCoreBundle:Language')->findOneBy(array('externalId' => (int)$order->siteId));
        if(!$language) {
            $this->syncSites();
        }

        // get order state
        $orderState = $this->objectManager->getRepository('EhandelCoreBundle:OrderState')->findOneBy(array('externalId' => (int)$order->orderState->id));
        if(!$orderState) {
            $this->syncOrderStates();
        }

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
            ->setNumber($order['id'])
            //->setLanguage($language)
            //->setOrderState($orderState)
            ->setCurrencyCode($order['currencyCode'])
            ->setTotalPrice($order['totalPrice'])
            ->setVat($order['vatPct'])
            ->setDate($created)
            ->setTrackingNumber($order['trackingNumber'])
            ->setTransactionNumber($order['transactionNumber'])
            //->setShippingMethod($shippingMethod)
            ->setShippingMethodId($order['shippingInfo']['id'])
            ->setShippingMethodName($order['shippingInfo']['name'])
            ->setShippingMethodFee($order['shippingInfo']['fee'])
            //->setPaymentMethod($paymentMethod)
            ->setPaymentMethodId($order['paymentInfo']['id'])
            ->setPaymentMethodName($order['paymentInfo']['name'])
            ->setPaymentMethodFee($order['paymentInfo']['fee'])
            ->setReferrer($order['referrer'])
            ->setIpAddress($order['ip'])
            ->setGiftCertificatePurchaseAmount($order['giftCertificateAmount'])

            // customer fields
            ->setCustomerId($order['customerInfo']['id'])
            ->setCustomerName($order['customerInfo']['attention'])
            ->setCustomerAddress($order['customerInfo']['address'])
            ->setCustomerZipCode($order['customerInfo']['zipCode'])
            ->setCustomerCity($order['customerInfo']['city'])
            ->setCustomerCountry($order['customerInfo']['country'])
            ->setCustomerPhone($order['customerInfo']['phone'])
            ->setCustomerEmail($order['customerInfo']['email'])

            // delivery fields
            ->setDeliveryName($order['deliveryInfo']['attention'])
            ->setDeliveryAddress($order['deliveryInfo']['address'])
            ->setDeliveryZipCode($order['deliveryInfo']['zipCode'])
            ->setDeliveryCity($order['deliveryInfo']['city'])
            ->setDeliveryCountry($order['deliveryInfo']['country'])
            ->setDeliveryPhone($order['deliveryInfo']['phone'])
            ->setDeliveryEmail($order['deliveryInfo']['email'])
        ;

        //$entity->clearOrderLines();

        if ($syncProducts) {
            $productNumbers = array();
            foreach ($order['orderLines'] as $orderLine) {
                $productNumbers[] = $orderLine['productId'];
            }

            //$this->syncProductsFromProductNumbers($productNumbers, false, $flush);
        }

        /*
        foreach($order['orderLines'] as $orderLine) {
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
    }
}
