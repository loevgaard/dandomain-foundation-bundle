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
     * @param \stdClass $media
     * @param bool      $flush
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
            ->setExternalId($media->id ? : null)
            ->setHeight($media->height ? : null)
            ->setMediaTranslations($media->mediaTranslations ? : null)
            ->setSortorder($media->sortorder ? : null)
            ->setThumbnail($media->thumbnail ? : null)
            ->setThumbnailheight($media->thumbnailheight ? : null)
            ->setThumbnailwidth($media->thumbnailwidth ? : null)
            ->setUrl($media->url ? : null)
            ->setWidth($media->width ? : null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
