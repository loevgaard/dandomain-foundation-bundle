<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface OrderLineInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return OrderLineInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFileUrl();

    /**
     * @param string $fileUrl
     *
     * @return OrderLineInterface
     */
    public function setFileUrl($fileUrl);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * @param OrderInterface $order
     *
     * @return OrderLineInterface
     */
    public function setOrder(OrderInterface $order = null);

    /**
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * The product can be null because Dandomain also adds discount and other non-products to order lines.
     *
     * @param ProductInterface $product
     *
     * @return OrderLineInterface
     */
    public function setProduct(ProductInterface $product = null);

    /**
     * @return int
     */
    public function getProductNumber();

    /**
     * In the API data for the order line the product number is the product id attribute.
     *
     * @param int $productNumber
     *
     * @return OrderLineInterface
     */
    public function setProductNumber($productNumber);

    /**
     * @return string
     */
    public function getProductName();

    /**
     * @param string $productName
     *
     * @return OrderLineInterface
     */
    public function setProductName($productName);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @param int $quantity
     *
     * @return OrderLineInterface
     */
    public function setQuantity($quantity);

    /**
     * @return string
     */
    public function getTotalPrice();

    /**
     * @return float
     */
    public function getTotalPriceInclVat();

    /**
     * @param string $totalPrice
     *
     * @return OrderLineInterface
     */
    public function setTotalPrice($totalPrice);

    /**
     * @return string
     */
    public function getUnitPrice();

    /**
     * @param string $unitPrice
     *
     * @return OrderLineInterface
     */
    public function setUnitPrice($unitPrice);

    /**
     * @return string
     */
    public function getVatPct();

    /**
     * @param string $vatPct
     *
     * @return OrderLineInterface
     */
    public function setVatPct($vatPct);

    /**
     * @return string
     */
    public function getVariant();

    /**
     * @param string $variant
     *
     * @return OrderLineInterface
     */
    public function setVariant($variant);

    /**
     * @return string
     */
    public function getXmlParams();

    /**
     * @param string $xmlParams
     *
     * @return OrderLineInterface
     */
    public function setXmlParams($xmlParams);
}
