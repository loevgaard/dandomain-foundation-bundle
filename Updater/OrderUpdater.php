<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Doctrine\Common\Collections\Criteria;
use GuzzleHttp\Exception\ClientException;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Repository\SiteRepository;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderLineInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;
use Loevgaard\DandomainFoundation\Entity\Order;
use Loevgaard\DandomainFoundation\Entity\OrderLine;
use Loevgaard\DandomainFoundation\Entity\Product;
use Loevgaard\DandomainFoundation\Repository\OrderRepository;
use Loevgaard\DandomainFoundation\Repository\ProductRepository;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CurrencySynchronizerInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductSynchronizerInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizerInterface;

class OrderUpdater implements OrderUpdaterInterface
{
    /**
     * This will hold ids for products indexed by product number.
     *
     * @var array
     */
    protected static $productCache;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

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
     * @var SiteRepository
     */
    protected $siteRepository;

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

    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * @var CurrencySynchronizerInterface
     */
    protected $currencySynchronizer;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        ProductSynchronizerInterface $productSynchronizer,
        ShippingMethodUpdaterInterface $shippingMethodUpdater,
        PaymentMethodUpdaterInterface $paymentMethodUpdater,
        SiteRepository $siteRepository,
        SiteSynchronizerInterface $siteSynchronizer,
        StateUpdaterInterface $stateUpdater,
        CustomerUpdaterInterface $customerUpdater,
        DeliveryUpdaterInterface $deliveryUpdater,
        InvoiceUpdaterInterface $invoiceUpdater,
        CurrencyRepository $currencyRepository,
        CurrencySynchronizerInterface $currencySynchronizer
    ) {
        self::$productCache = [];
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->productSynchronizer = $productSynchronizer;
        $this->shippingMethodUpdater = $shippingMethodUpdater;
        $this->paymentMethodUpdater = $paymentMethodUpdater;
        $this->siteRepository = $siteRepository;
        $this->siteSynchronizer = $siteSynchronizer;
        $this->stateUpdater = $stateUpdater;
        $this->customerUpdater = $customerUpdater;
        $this->deliveryUpdater = $deliveryUpdater;
        $this->invoiceUpdater = $invoiceUpdater;
        $this->currencyRepository = $currencyRepository;
        $this->currencySynchronizer = $currencySynchronizer;
    }

    /**
     * @param array $data
     * @return OrderInterface
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateFromApiResponse(array $data): OrderInterface
    {
        $order = $this->orderRepository->findOneByExternalId($data['id']);
        if (!$order) {
            $order = new Order();
        }

        // we start by syncing the currency, since we use the currency to create Money objects
        $currency = $this->currencyRepository->findOneByCode($data['currencyCode']);
        if(!$currency) {
            $currency = $this->currencySynchronizer->syncOne([
                'code' => $data['currencyCode']
            ]);

            if(!$currency) {
                throw new \RuntimeException('Could not sync currency `'.$data['currencyCode'].'`. Try again');
            }
        }

        $currencyCode = $currency->getIsoCodeAlpha();

        // set shortcuts for embedded objects
        $orderLinesData = $data['orderLines'] ?? [];
        $paymentData = $data['paymentInfo'] ?? [];
        $shippingData = $data['shippingInfo'] ?? [];

        $createdDate = DateTimeImmutable::createFromJson($data['createdDate']);
        $modifiedDate = DateTimeImmutable::createFromJson($data['modifiedDate']);

        $giftCertificateAmount = DandomainFoundation\createMoneyFromFloat($currencyCode, $data['giftCertificateAmount']);
        $totalPrice = DandomainFoundation\createMoneyFromFloat($currencyCode, $data['totalPrice']);
        $salesDiscount = DandomainFoundation\createMoneyFromFloat($currencyCode, $data['salesDiscount']);
        $paymentMethodFee = DandomainFoundation\createMoneyFromFloat($currencyCode, $paymentData['fee'] ?? 0.0);
        $shippingMethodFee = DandomainFoundation\createMoneyFromFloat($currencyCode, $shippingData['fee'] ?? 0.0);

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
        $paymentMethod = $this->paymentMethodUpdater->updateFromEmbeddedApiResponse($data['paymentInfo'], $currencyCode, $order->getPaymentMethod());
        $order->setPaymentMethod($paymentMethod);

        // populate shipping info
        $shippingMethod = $this->shippingMethodUpdater->updateFromEmbeddedApiResponse($data['shippingInfo'], $currencyCode, $order->getShippingMethod());
        $order->setShippingMethod($shippingMethod);

        // populate site
        $site = $this->siteRepository->findOneByExternalId($data['siteId']);
        if(!$site) {
            $site = $this->siteSynchronizer->syncOne([
                'externalId' => $data['siteId'],
            ]);

            if(!$site) {
                throw new \RuntimeException('Could not sync site with id `'.$data['siteId'].'`. Try again');
            }
        }
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
                    if ($orderLineData['id'] === $orderLineEntity->getExternalId()) {
                        $found = true;
                    }
                }

                if (!$found) {
                    $removeOrderLines[] = $orderLineEntity;
                }
            }

            foreach ($removeOrderLines as $removeOrderLine) {
                $order->removeOrderLine($removeOrderLine);
            }

            // then update the rest of the order lines
            foreach ($orderLinesData as $orderLineData) {
                if (!$orderLineData['id']) {
                    continue;
                }

                $collection = $order
                    ->getOrderLines()
                    ->matching(
                        Criteria::create()->where(Criteria::expr()->eq('externalId', $orderLineData['id']))
                    );

                if ($collection->count()) {
                    $orderLineEntity = $collection->first();
                } else {
                    $orderLineEntity = new OrderLine();
                    $order->addOrderLine($orderLineEntity);
                }

                $orderLineUnitPrice = DandomainFoundation\createMoneyFromFloat($currencyCode, $orderLineData['unitPrice'] ?? 0.0);
                $orderLineTotalPrice = DandomainFoundation\createMoneyFromFloat($currencyCode, $orderLineData['totalPrice'] ?? 0.0);

                $orderLineEntity
                    ->setExternalId((int) $orderLineData['id'])
                    ->setFileUrl($orderLineData['fileUrl'])
                    ->setProductNumber($orderLineData['productId'])
                    ->setProductName($orderLineData['productName'])
                    ->setQuantity((int) $orderLineData['quantity'])
                    ->setTotalPrice($orderLineTotalPrice)
                    ->setUnitPrice($orderLineUnitPrice)
                    ->setVatPct((float) $orderLineData['vatPct'])
                    ->setVariant($orderLineData['variant'])
                    ->setXmlParams($orderLineData['xmlParams'])
                ;

                $product = $this->getProductFromOrderLine($orderLineEntity);
                if ($product) {
                    $orderLineEntity->setProduct($product);
                }
            }
        } else {
            $order->clearOrderLines();
        }

        return $order;
    }

    /**
     * Returns true if the $orderLine is a product
     * Returns false if the $orderLine is a gift card, or something else that doesn't qualify as a product.
     *
     * @param OrderLineInterface $orderLine
     * @return ProductInterface|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function getProductFromOrderLine(OrderLineInterface $orderLine): ?ProductInterface
    {
        // if the order line does not have a product number we know it's not a product
        // since this is a requirement in Dandomain for products
        if (empty($orderLine->getProductNumber())) {
            return null;
        }

        // products can not have a negative value, but discounts can
        if ($orderLine->getUnitPrice()->isNegative()) {
            return null;
        }

        // the product cache will only hold valid products
        if (isset(self::$productCache[$orderLine->getProductNumber()])) {
            /** @var ProductInterface $product */
            $product = $this->productRepository->getReference(self::$productCache[$orderLine->getProductNumber()]);

            return $product;
        }

        try {
            $product = $this->productSynchronizer->syncOne([
                'number' => $orderLine->getProductNumber(),
            ]);
        } catch (ClientException $e) {
            if (404 === $e->getResponse()->getStatusCode()) {
                $product = new Product();
                $product->setNumber($orderLine->getProductNumber());

                // if the product doesn't exist we mark it as deleted when we sync it
                $product->delete();

                $this->productRepository->save($product);
            } else {
                throw $e;
            }
        }

        self::$productCache[$orderLine->getProductNumber()] = $product->getId();

        return $product;
    }
}
