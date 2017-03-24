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

        $createdDate = \Dandomain\Api\jsonDateToDate($order->createdDate);
        $createdDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        $modifiedDate = \Dandomain\Api\jsonDateToDate($order->modifiedDate);
        $modifiedDate->setTimezone(new \DateTimeZone('Europe/Copenhagen'));

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
            ->setModifiedDate($modifiedDate)
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

        if ($flush) {
            $this->objectManager->flush();
        }

        return $result;
    }
}
