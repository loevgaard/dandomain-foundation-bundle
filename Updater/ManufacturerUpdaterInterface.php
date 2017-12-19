<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ManufacturerInterface;

interface ManufacturerUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data): ManufacturerInterface;
}
