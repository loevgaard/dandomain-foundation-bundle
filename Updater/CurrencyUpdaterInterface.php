<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;

interface CurrencyUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data): CurrencyInterface;
}
