<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ShippingMethodInterface
{
    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return ShippingMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fee
     *
     * @return string
     */
    public function getFee();

    /**
     * Set fee
     *
     * @param string $fee
     *
     * @return ShippingMethodInterface
     */
    public function setFee($fee);

    /**
     * Get feeInclVat
     *
     * @return boolean
     */
    public function getFeeInclVat();

    /**
     * Set feeInclVat
     *
     * @param boolean $feeInclVat
     *
     * @return ShippingMethodInterface
     */
    public function setFeeInclVat($feeInclVat);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ShippingMethodInterface
     */
    public function setName($name);
}
