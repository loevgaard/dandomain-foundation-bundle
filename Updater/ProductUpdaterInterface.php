<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\ProductInterface;

interface ProductUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data) : ProductInterface;
}