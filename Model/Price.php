<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Price implements PriceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Period
     */
    protected $period;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $amount;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $avance;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $currencyCode;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $isoCode;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $periodId;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $specialOfferPrice;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $unitPrice;

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * {@inheritdoc}
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getB2bGroupId()
    {
        return $this->b2bGroupId;
    }

    /**
     * {@inheritdoc}
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

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
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPeriodId()
    {
        return $this->periodId;
    }

    /**
     * {@inheritdoc}
     */
    public function setPeriodId($periodId)
    {
        $this->periodId = $periodId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSpecialOfferPrice()
    {
        return $this->specialOfferPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setSpecialOfferPrice($specialOfferPrice)
    {
        $this->specialOfferPrice = $specialOfferPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }
}
