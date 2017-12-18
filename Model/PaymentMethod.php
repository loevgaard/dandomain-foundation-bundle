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
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal", precision=12, scale=2)
     */
    protected $fee;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $feeInclVat;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * {@inheritdoc}
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFeeInclVat()
    {
        return $this->feeInclVat;
    }

    /**
     * {@inheritdoc}
     */
    public function setFeeInclVat($feeInclVat)
    {
        $this->feeInclVat = $feeInclVat;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
