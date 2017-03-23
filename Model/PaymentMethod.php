<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class PaymentMethod implements PaymentMethodInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal")
     */
    protected $fee;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $feeInclVat;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return PaymentMethod
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get fee
     *
     * @return string
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set fee
     *
     * @param string $fee
     *
     * @return PaymentMethod
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get feeInclVat
     *
     * @return boolean
     */
    public function getFeeInclVat()
    {
        return $this->feeInclVat;
    }

    /**
     * Set feeInclVat
     *
     * @param boolean $feeInclVat
     *
     * @return PaymentMethod
     */
    public function setFeeInclVat($feeInclVat)
    {
        $this->feeInclVat = $feeInclVat;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PaymentMethod
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
