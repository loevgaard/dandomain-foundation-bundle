<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PaymentMethodInterface
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
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
     */
    public function setName($name);
}
