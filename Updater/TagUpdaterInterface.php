<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;

interface TagUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data): TagInterface;
}
