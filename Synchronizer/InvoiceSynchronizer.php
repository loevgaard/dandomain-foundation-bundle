<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\InvoiceInterface;

class InvoiceSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Invoice';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\InvoiceInterface';

    /**
     * Synchronizes Invoice.
     *
     * @param array            $invoice
     * @param bool             $flush
     * @param InvoiceInterface $invoiceEntity
     *
     * @return InvoiceInterface
     */
    public function syncInvoice($invoice, $flush = true, $invoiceEntity = null)
    {
        if (null === $invoiceEntity) {
            $entity = new $this->entityClassName();
        } else {
            $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                'id' => $invoiceEntity->getId(),
            ]);
        }

        if ($invoice->date) {
            $date = \Dandomain\Api\jsonDateToDate($invoice->date);
            $date->setTimezone(new \DateTimeZone('Europe/Copenhagen'));
        } else {
            $date = null;
        }

        $entity
            ->setCreditNoteNumber($invoice->creditNoteNumber)
            ->setIsPaid($invoice->isPaid)
            ->setNumber($invoice->number)
            ->setState($invoice->state)
        ;

        if (null !== $date) {
            $entity->setDate($date);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
