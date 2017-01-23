<?php
namespace Loevgaard\DandomainFoundation\Synchronizer;

use Dandomain\Api\Api as DandomainApi;
use Doctrine\Common\Persistence\ObjectManager;
use Loevgaard\DandomainFoundation\Model\Order;

class OrderSynchronizer implements SynchronizerInterface {
    /** @var ObjectManager */
    protected $objectManager;

    /** @var DandomainApi */
    protected $api;

    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundation\\Model\\OrderInterface';

    /** @var string */
    protected $entityClassName = 'Loevgaard\\DandomainFoundation\\Model\\Order';

    /**
     * @todo prepend typehint to $objectManager
     * @param $objectManager
     * @param DandomainApi $api
     * @param null $entityClassName
     */
    public function __construct($objectManager, DandomainApi $api, $entityClassName = null)
    {
        $this->objectManager    = $objectManager;
        $this->api              = $api;

        if($entityClassName) {
            $interfaces = class_implements($entityClassName);
            if(!isset($interfaces[$this->entityInterfaceName])) {
                throw new \InvalidArgumentException("Class '$entityClassName' should implement {$this->entityInterfaceName}");
            }
            $this->entityClassName  = $entityClassName;
        }
    }

    public function syncOrder($order, $flush = true, $syncProducts = true) {
        // if $order is numeric we expect it to be an order id, not an id in the database, but an order id from Dandomain
        if (is_numeric($order)) {
            $order = \GuzzleHttp\json_decode($this->api->order->getOrder($order)->getBody()->getContents(), true);
        }

        /** @var Order $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'number' => $order['id']
        ]);

        if(!$entity) {
            $entity = new $this->entityClassName;
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

        if($syncProducts) {
            $productNumbers = array();
            foreach($order['orderLines'] as $orderLine) {
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

        if($flush) {
            $this->objectManager->flush();
        }
    }
}