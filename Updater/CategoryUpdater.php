<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;

class CategoryUpdater implements CategoryUpdaterInterface
{
    public function updateFromApiResponse(array $data) : CategoryInterface
    {
    }
}