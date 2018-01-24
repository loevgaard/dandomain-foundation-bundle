<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\QueueItem;
use Loevgaard\DandomainFoundation\Repository\QueueItemRepository;

abstract class Enqueuer implements EnqueuerInterface
{
    /**
     * @var QueueItemRepository
     */
    protected $queueItemRepository;

    public function __construct(QueueItemRepository $queueItemRepository)
    {
        $this->queueItemRepository = $queueItemRepository;
    }

    /**
     * @param string $identifier
     * @param string $type
     *
     * @return QueueItemInterface
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function _enqueue(string $identifier, string $type): QueueItemInterface
    {
        $queueItem = QueueItem::create($identifier, $type);

        $this->queueItemRepository->save($queueItem);

        return $queueItem;
    }
}
