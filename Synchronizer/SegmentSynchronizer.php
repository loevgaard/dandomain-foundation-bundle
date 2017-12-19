<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\SegmentInterface;

class SegmentSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Segment';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\SegmentInterface';

    /**
     * Synchronizes Segment.
     *
     * @param \stdClass $segment
     * @param bool      $flush
     *
     * @return SegmentInterface
     */
    public function syncSegment($segment, $flush = true)
    {
        if (is_numeric($segment)) {
            $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                'externalId' => $segment,
            ]);
        } else {
            $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
                'externalId' => $segment->id,
            ]);

            if (!($entity)) {
                $entity = new $this->entityClassName();
            }

            $entity
                ->setExternalId($segment->id ?: null)
                ->setSegmentOptions($segment->segmentOptions ?: null)
            ;

            $this->objectManager->persist($entity);

            if (true === $flush) {
                $this->objectManager->flush($entity);
            }
        }

        return $entity;
    }
}
