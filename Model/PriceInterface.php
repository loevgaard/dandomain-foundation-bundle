<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PriceInterface
{
    /**
     * Get amount.
     *
     * @return int
     */
    public function getAmount();

    /**
     * Set amount.
     *
     * @param int $amount
     *
     * @return PriceInterface
     */
    public function setAmount($amount);

    /**
     * Get avance.
     *
     * @return int
     */
    public function getAvance();

    /**
     * Set avance.
     *
     * @param int $avance
     *
     * @return PriceInterface
     */
    public function setAvance($avance);

    /**
     * Get b2bGroupId.
     *
     * @return string
     */
    public function getB2bGroupId();

    /**
     * Set b2bGroupId.
     *
     * @param string $b2bGroupId
     *
     * @return PriceInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * Get currencyCode.
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Set currencyCode.
     *
     * @param string $currencyCode
     *
     * @return PriceInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get isoCode.
     *
     * @return int
     */
    public function getIsoCode();

    /**
     * Set isoCode.
     *
     * @param int $isoCode
     *
     * @return PriceInterface
     */
    public function setIsoCode($isoCode);

    /**
     * Get period.
     *
     * @return PeriodInterface
     */
    public function getPeriod();

    /**
     * Set period.
     *
     * @param PeriodInterface $period
     *
     * @return PriceInterface
     */
    public function setPeriod(PeriodInterface $period = null);

    /**
     * Get periodId.
     *
     * @return int
     */
    public function getPeriodId();

    /**
     * Set periodId.
     *
     * @param int $periodId
     *
     * @return PriceInterface
     */
    public function setPeriodId($periodId);

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return PriceInterface
     */
    public function addProduct(ProductInterface $product);

    /**
     * Get products.
     *
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
     * Get specialOfferPrice.
     *
     * @return string
     */
    public function getSpecialOfferPrice();

    /**
     * Set specialOfferPrice.
     *
     * @param string $specialOfferPrice
     *
     * @return PriceInterface
     */
    public function setSpecialOfferPrice($specialOfferPrice);

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
     * @return PriceInterface
     */
    public function setUnitPrice($unitPrice);
}
