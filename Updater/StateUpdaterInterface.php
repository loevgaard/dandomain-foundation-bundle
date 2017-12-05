<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\StateInterface;

interface StateUpdaterInterface extends UpdaterInterface
{
    public function updateFromApiResponse(array $data) : StateInterface;
    public function updateFromEmbeddedApiResponse(array $data, StateInterface $state = null) : StateInterface;
}