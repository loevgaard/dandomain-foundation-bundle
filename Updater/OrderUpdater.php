<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Doctrine\Common\Collections\Criteria;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Entity\Order;
use Loevgaard\DandomainFoundation\Entity\OrderLine;
use Loevgaard\DandomainFoundationBundle\Entity\OrderRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductSynchronizerInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizerInterface;

class OrderUpdater implements OrderUpdaterInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * @var ProductSynchronizerInterface
     */
    protected $productSynchronizer;

    /**
     * @var ShippingMethodUpdaterInterface
     */
    protected $shippingMethodUpdater;

    /**
     * @var PaymentMethodUpdaterInterface
     */
    protected $paymentMethodUpdater;

    /**
     * @var SiteSynchronizerInterface
     */
    protected $siteSynchronizer;

    /**
     * @var StateUpdaterInterface
     */
    protected $stateUpdater;

    /**
     * @var CustomerUpdaterInterface
     */
    protected $customerUpdater;

    /**
     * @var DeliveryUpdaterInterface
     */
    protected $deliveryUpdater;

    /**
     * @var InvoiceUpdaterInterface
     */
    protected $invoiceUpdater;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductSynchronizerInterface $productSynchronizer,
        ShippingMethodUpdaterInterface $shippingMethodUpdater,
        PaymentMethodUpdaterInterface $paymentMethodUpdater,
        SiteSynchronizerInterface $siteSynchronizer,
        StateUpdaterInterface $stateUpdater,
        CustomerUpdaterInterface $customerUpdater,
        DeliveryUpdaterInterface $deliveryUpdater,
        InvoiceUpdaterInterface $invoiceUpdater
    ) {
        $this->orderRepository = $orderRepository;
        $this->productSynchronizer = $productSynchronizer;
        $this->shippingMethodUpdater = $shippingMethodUpdater;
        $this->paymentMethodUpdater = $paymentMethodUpdater;
        $this->siteSynchronizer = $siteSynchronizer;
        $this->stateUpdater = $stateUpdater;
        $this->customerUpdater = $customerUpdater;
        $this->deliveryUpdater = $deliveryUpdater;
        $this->invoiceUpdater = $invoiceUpdater;
    }

    public function updateFromApiResponse(array $data) : OrderInterface
    {
        $order = $this->orderRepository->findOneByExternalId($data['id']);
        if(!$order) {
            $order = new Order();
        }

        // this is the currency we use to create Money object through this method
        $currency = $data['currencyCode'];

        // set shortcuts for embedded objects
        $orderLinesData = $data['orderLines'] ?? [];
        $paymentData = $data['paymentInfo'] ?? [];
        $shippingData = $data['shippingInfo'] ?? [];

        $createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        $modifiedDate = DateTimeImmutable::createFromJson($data['modifiedDate']);

        $giftCertificateAmount = DandomainFoundation\createMoneyFromFloat($currency, $data['giftCertificateAmount']);
        $totalPrice = DandomainFoundation\createMoneyFromFloat($currency, $data['totalPrice']);
        $salesDiscount = DandomainFoundation\createMoneyFromFloat($currency, $data['salesDiscount']);
        $paymentMethodFee = DandomainFoundation\createMoneyFromFloat($currency, $paymentData['fee'] ?? 0.0);
        $shippingMethodFee = DandomainFoundation\createMoneyFromFloat($currency, $shippingData['fee'] ?? 0.0);

        $order
            ->setExternalId($data['id'])
            ->setCurrencyCode($data['currencyCode'])
            ->setComment($data['comment'])
            ->setCreatedDate($createdDate)
            ->setCustomerComment($data['customerComment'])
            ->setGiftCertificateAmount($giftCertificateAmount)
            ->setGiftCertificateNumber($data['giftCertificateNumber'])
            ->setIncomplete($data['incomplete'])
            ->setIp($data['ip'])
            ->setModified($data['modified'])
            ->setModifiedDate($modifiedDate)
            ->setReferenceNumber($data['referenceNumber'])
            ->setReferrer($data['referrer'])
            ->setReservedField1($data['reservedField1'])
            ->setReservedField2($data['reservedField2'])
            ->setReservedField3($data['reservedField3'])
            ->setReservedField4($data['reservedField4'])
            ->setReservedField5($data['reservedField5'])
            ->setSalesDiscount($salesDiscount)
            ->setTotalPrice($totalPrice)
            ->setTotalWeight($data['totalWeight'])
            ->setTrackingNumber($data['trackingNumber'])
            ->setTransactionNumber($data['transactionNumber'])
            ->setVatPct($data['vatPct'])
            ->setVatRegNumber($data['vatRegNumber'])
            ->setXmlParams($data['xmlParams'])
            ->setShippingMethodFee($shippingMethodFee)
            ->setPaymentMethodFee($paymentMethodFee)
        ;

        // populate customer info
        $customer = $this->customerUpdater->updateFromEmbeddedApiResponse($data['customerInfo']);
        $order->setCustomer($customer);

        // populate delivery info
        $delivery = $this->deliveryUpdater->updateFromEmbeddedApiResponse($data['deliveryInfo'], $order->getDelivery());
        $order->setDelivery($delivery);

        // populate invoice info
        $invoice = $this->invoiceUpdater->updateFromEmbeddedApiResponse($data['invoiceInfo'], $order->getInvoice());
        $order->setInvoice($invoice);

        // populate payment info
        $paymentMethod = $this->paymentMethodUpdater->updateFromEmbeddedApiResponse($data['paymentInfo'], $currency, $order->getPaymentMethod());
        $order->setPaymentMethod($paymentMethod);

        // populate shipping info
        $shippingMethod = $this->shippingMethodUpdater->updateFromEmbeddedApiResponse($data['shippingInfo'], $currency, $order->getShippingMethod());
        $order->setShippingMethod($shippingMethod);

        // populate site
        $site = $this->siteSynchronizer->syncOne([
            'externalId' => $data['siteId']
        ]);
        $order->setSite($site);

        // populate state
        $state = $this->stateUpdater->updateFromEmbeddedApiResponse($data['orderState'], $order->getState());
        $order->setState($state);


        if (count($orderLinesData)) {
            // first remove order lines that are not present anymore
            $removeOrderLines = [];
            foreach ($order->getOrderLines() as $orderLineEntity) {
                $found = false;
                foreach ($orderLinesData as $orderLineData) {
                    if($orderLineData['id'] === $orderLineEntity->getExternalId()) {
                        $found = true;
                    }
                }

                if(!$found) {
                    $removeOrderLines[] = $orderLineEntity;
                }
            }

            foreach ($removeOrderLines as $removeOrderLine) {
                $order->removeOrderLine($removeOrderLine);
            }

            // then update the rest of the order lines
            foreach ($orderLinesData as $orderLineData) {
                if(!$orderLineData['id']) {
                    continue;
                }

                $collection = $order
                    ->getOrderLines()
                    ->matching(
                        Criteria::create()->where(Criteria::expr()->eq('externalId', $orderLineData['id']))
                    );

                if($collection->count()) {
                    $orderLineEntity = $collection->first();
                } else {
                    $orderLineEntity = new OrderLine();
                    $order->addOrderLine($orderLineEntity);
                }

                $orderLineUnitPrice = DandomainFoundation\createMoneyFromFloat($currency, $orderLineData['unitPrice'] ?? 0.0);
                $orderLineTotalPrice = DandomainFoundation\createMoneyFromFloat($currency, $orderLineData['totalPrice'] ?? 0.0);

                $orderLineEntity
                    ->setExternalId($orderLineData['id'])
                    ->setFileUrl($orderLineData['fileUrl'])
                    ->setProductNumber($orderLineData['productId'])
                    ->setProductName($orderLineData['productName'])
                    ->setQuantity($orderLineData['quantity'])
                    ->setTotalPrice($orderLineTotalPrice)
                    ->setUnitPrice($orderLineUnitPrice)
                    ->setVatPct($orderLineData['vatPct'])
                    ->setVariant($orderLineData['variant'])
                    ->setXmlParams($orderLineData['xmlParams'])
                ;

                if ($orderLineData['productId']) {
                    try {
                        $product = $this->productSynchronizer->syncOne([
                            'number' => $orderLineData['productId']
                        ]);
                        $orderLineEntity->setProduct($product);
                    } catch (\Exception $e) {
                        echo $e->getMessage()."\n";
                    }
                }
            }
        } else {
            $order->clearOrderLines();
        }

        return $order;
    }
}