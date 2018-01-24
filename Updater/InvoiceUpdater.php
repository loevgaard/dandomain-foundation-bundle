<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface;
use Loevgaard\DandomainFoundation\Entity\Invoice;

class InvoiceUpdater implements InvoiceUpdaterInterface
{
    public function updateFromEmbeddedApiResponse(array $data, InvoiceInterface $invoice = null): InvoiceInterface
    {
        if (!$invoice) {
            $invoice = new Invoice();
        }

        if ($data['date']) {
            $invoice->setDate(DateTimeImmutable::createFromJson($data['date']));
        }

        $invoice
            ->setCreditNoteNumber($data['creditNoteNumber'])
            ->setIsPaid($data['isPaid'])
            ->setNumber($data['number'])
            ->setState($data['state'])
        ;

        return $invoice;
    }
}
