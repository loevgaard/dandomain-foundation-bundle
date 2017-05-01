<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface OrderLineInterface
{
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
     * @return OrderLineInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fileUrl.
     *
     * @return string
     */
    public function getFileUrl();

    /**
     * Set fileUrl.
     *
     * @param string $fileUrl
     *
     * @return OrderLineInterface
     */
    public function setFileUrl($fileUrl);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get order.
     *
     * @return OrderInterface
     */
    public function getOrder();

    /**
     * Set order.
     *
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
     * @param ProductInterface $product
     *
     * @return OrderLineInterface
     */
    public function setProduct($product);

    /**
     * Get productId.
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set productId.
     *
     * @param int $productId
     *
     * @return OrderLineInterface
     */
    public function setProductId($productId);

    /**
     * Get productName.
     *
     * @return string
     */
    public function getProductName();

    /**
     * Set productName.
     *
     * @param string $productName
     *
     * @return OrderLineInterface
     */
    public function setProductName($productName);

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity();

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return OrderLineInterface
     */
    public function setQuantity($quantity);

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
     * @return OrderLineInterface
     */
    public function setTotalPrice($totalPrice);

    /**
     * Get unitPrice.
     *
     * @return string
     */
    public function getUnitPrice();

    /**
     * Set unitPrice.
     *
     * @param string $unitPrice
     *
     * @return OrderLineInterface
     */
    public function setUnitPrice($unitPrice);

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
     * @return OrderLineInterface
     */
    public function setVatPct($vatPct);

    /**
     * Get variant.
     *
     * @return string
     */
    public function getVariant();

    /**
     * Set variant.
     *
     * @param string $variant
     *
     * @return OrderLineInterface
     */
    public function setVariant($variant);

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
     * @return OrderLineInterface
     */
    public function setXmlParams($xmlParams);
}
