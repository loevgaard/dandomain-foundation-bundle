<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\CustomerInterface;

interface CustomerUpdaterInterface extends UpdaterInterface
{
    public function updateFromEmbeddedApiResponse(array $data): CustomerInterface;
}
