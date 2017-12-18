<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ShippingMethodInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return ShippingMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFee();

    /**
     * @param string $fee
     *
     * @return ShippingMethodInterface
     */
    public function setFee($fee);

    /**
     * @return bool
     */
    public function getFeeInclVat();

    /**
     * @param bool $feeInclVat
     *
     * @return ShippingMethodInterface
     */
    public function setFeeInclVat($feeInclVat);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return ShippingMethodInterface
     */
    public function setName($name);
}
