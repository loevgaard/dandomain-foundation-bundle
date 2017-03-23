<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface InvoiceInterface
{
    /**
     * Get creditNoteNumber
     *
     * @return string
     */
    public function getCreditNoteNumber();

    /**
     * Set creditNoteNumber
     *
     * @param string $creditNoteNumber
     *
     * @return InvoiceInterface
     */
    public function setCreditNoteNumber($creditNoteNumber);

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate();

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return InvoiceInterface
     */
    public function setDate($date);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get isPaid
     *
     * @return boolean
     */
    public function getIsPaid();

    /**
     * Set isPaid
     *
     * @param boolean $isPaid
     *
     * @return InvoiceInterface
     */
    public function setIsPaid($isPaid);

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber();

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return InvoiceInterface
     */
    public function setNumber($number);

    /**
     * Get state
     *
     * @return string
     */
    public function getState();

    /**
     * Set state
     *
     * @param string $state
     *
     * @return InvoiceInterface
     */
    public function setState($state);
}
