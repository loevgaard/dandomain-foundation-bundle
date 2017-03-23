<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Invoice implements InvoiceInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $creditNoteNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $isPaid;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $state;

    /**
     * {@inheritdoc}
     */
    public function getCreditNoteNumber()
    {
        return $this->creditNoteNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreditNoteNumber($creditNoteNumber)
    {
        $this->creditNoteNumber = $creditNoteNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * {@inheritdoc}
     */
    public function setDate($date)
    {
        $this->date = $date;

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
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}
