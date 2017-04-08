<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PriceInterface
{
    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount();

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return PriceInterface
     */
    public function setAmount($amount);

    /**
     * Get avance
     *
     * @return integer
     */
    public function getAvance();

    /**
     * Set avance
     *
     * @param integer $avance
     *
     * @return PriceInterface
     */
    public function setAvance($avance);

    /**
     * Get b2bGroupId
     *
     * @return string
     */
    public function getB2bGroupId();

    /**
     * Set b2bGroupId
     *
     * @param string $b2bGroupId
     *
     * @return PriceInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return PriceInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get isoCode
     *
     * @return integer
     */
    public function getIsoCode();

    /**
     * Set isoCode
     *
     * @param integer $isoCode
     *
     * @return PriceInterface
     */
    public function setIsoCode($isoCode);

    /**
     * Get periodId
     *
     * @return integer
     */
    public function getPeriodId();

    /**
     * Set periodId
     *
     * @param integer $periodId
     *
     * @return PriceInterface
     */
    public function setPeriodId($periodId);

    /**
     * Get specialOfferPrice
     *
     * @return string
     */
    public function getSpecialOfferPrice();

    /**
     * Set specialOfferPrice
     *
     * @param string $specialOfferPrice
     *
     * @return PriceInterface
     */
    public function setSpecialOfferPrice($specialOfferPrice);

    /**
     * Get unitPrice
     *
     * @return string
     */
    public function getUnitPrice();

    /**
     * Set unitPrice
     *
     * @param string $unitPrice
     *
     * @return PriceInterface
     */
    public function setUnitPrice($unitPrice);
}
