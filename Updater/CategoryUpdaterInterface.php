<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;

interface CategoryUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data) : CategoryInterface;
}