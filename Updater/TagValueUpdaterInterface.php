<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;

interface TagValueUpdaterInterface extends UpdaterInterface
{
    /**
     * @param array $data
     * @param bool $updateData If true, the method will update the data of the entity, if false it will only create the entity if it doesn't exist
     * @return TagValueInterface
     */
    public function updateFromEmbeddedApiResponse(array $data, bool $updateData = true): TagValueInterface;
}
