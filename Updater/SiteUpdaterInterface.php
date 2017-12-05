<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\SiteInterface;

interface SiteUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data) : SiteInterface;
}