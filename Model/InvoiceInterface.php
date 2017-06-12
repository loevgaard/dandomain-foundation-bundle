<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface InvoiceInterface
{
    /**
     * @return string
     */
    public function getCreditNoteNumber();

    /**
     * @param string $creditNoteNumber
     *
     * @return InvoiceInterface
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * @return \DateTime
     */
    public function getDate();

    /**
     * @param \DateTime $date
     *
     * @return InvoiceInterface
     */
    public function setDate($date);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function getIsPaid();

    /**
     * @param bool $isPaid
     *
     * @return InvoiceInterface
     */
    public function setIsPaid($isPaid);

    /**
     * @return int
     */
    public function getNumber();

    /**
     * @param int $number
     *
     * @return InvoiceInterface
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $state
     *
     * @return InvoiceInterface
     */
    public function setState($state);
}
