<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PaymentMethodInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return PaymentMethodInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFee();

    /**
     * @param string $fee
     *
     * @return PaymentMethodInterface
     */
    public function setFee($fee);

    /**
     * @return bool
     */
    public function getFeeInclVat();

    /**
     * @param bool $feeInclVat
     *
     * @return PaymentMethodInterface
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
     * @return PaymentMethodInterface
     */
    public function setName($name);
}
