<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ShippingMethodInterface
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
     * @return ShippingMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fee.
     *
     * @return string
     */
    public function getFee();

    /**
     * Set fee.
     *
     * @param string $fee
     *
     * @return ShippingMethodInterface
     */
    public function setFee($fee);

    /**
     * Get feeInclVat.
     *
     * @return bool
     */
    public function getFeeInclVat();

    /**
     * Set feeInclVat.
     *
     * @param bool $feeInclVat
     *
     * @return ShippingMethodInterface
     */
    public function setFeeInclVat($feeInclVat);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return ShippingMethodInterface
     */
    public function setName($name);
}
