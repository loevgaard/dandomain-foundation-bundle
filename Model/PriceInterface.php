<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PriceInterface
{
    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     *
     * @return PriceInterface
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getAvance();

    /**
     * @param int $avance
     *
     * @return PriceInterface
     */
    public function setAvance($avance);

    /**
     * @return string
     */
    public function getB2bGroupId();

    /**
     * @param string $b2bGroupId
     *
     * @return PriceInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * @return string
     */
    public function getCurrencyCode();

    /**
     * @param string $currencyCode
     *
     * @return PriceInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getIsoCode();

    /**
     * @param int $isoCode
     *
     * @return PriceInterface
     */
    public function setIsoCode($isoCode);

    /**
     * @return PeriodInterface
     */
    public function getPeriod();

    /**
     * @param PeriodInterface $period
     *
     * @return PriceInterface
     */
    public function setPeriod(PeriodInterface $period = null);

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return PriceInterface
     */
    public function addProduct(ProductInterface $product);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts();

    /**
     * Remove product.
     *
     * @param ProductInterface $product
     *
     * @return PriceInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * @return string
     */
    public function getSpecialOfferPrice();

    /**
     * @param string $specialOfferPrice
     *
     * @return PriceInterface
     */
    public function setSpecialOfferPrice($specialOfferPrice);

    /**
     * @return string
     */
    public function getUnitPrice();

    /**
     * @param string $unitPrice
     *
     * @return PriceInterface
     */
    public function setUnitPrice($unitPrice);
}
