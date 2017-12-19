<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\PeriodInterface;

interface PeriodUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data): PeriodInterface;
}
