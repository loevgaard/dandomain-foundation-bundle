<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface InvoiceInterface
{
    /**
     * Get creditNoteNumber.
     *
     * @return string
     */
    public function getCreditNoteNumber();

    /**
     * Set creditNoteNumber.
     *
     * @param string $creditNoteNumber
     *
     * @return InvoiceInterface
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate();

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return InvoiceInterface
     */
    public function setDate($date);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get isPaid.
     *
     * @return bool
     */
    public function getIsPaid();

    /**
     * Set isPaid.
     *
     * @param bool $isPaid
     *
     * @return InvoiceInterface
     */
    public function setIsPaid($isPaid);

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber();

    /**
     * Set number.
     *
     * @param int $number
     *
     * @return InvoiceInterface
     */
    public function setNumber($number);

    /**
     * Get state.
     *
     * @return string
     */
    public function getState();

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return InvoiceInterface
     */
    public function setState($state);
}
