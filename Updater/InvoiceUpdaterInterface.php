<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\InvoiceInterface;

interface InvoiceUpdaterInterface extends UpdaterInterface
{
    public function updateFromEmbeddedApiResponse(array $data, InvoiceInterface $invoice = null) : InvoiceInterface;
}