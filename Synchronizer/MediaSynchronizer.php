<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\MediaInterface;

class MediaSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Media';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\MediaInterface';

    /**
     * Synchronizes Media.
     *
     * @param array $media
     * @param bool  $flush
     *
     * @return MediaInterface
     */
    public function syncMedia($media, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $media->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($media->id)
            ->setHeight($media->height)
            ->setMediaTranslations($media->mediaTranslations)
            ->setSortorder($media->sortorder)
            ->setThumbnail($media->thumbnail)
            ->setThumbnailheight($media->thumbnailheight)
            ->setThumbnailwidth($media->thumbnailwidth)
            ->setUrl($media->url)
            ->setWidth($media->width)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
