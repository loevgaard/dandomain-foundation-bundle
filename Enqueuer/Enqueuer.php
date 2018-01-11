<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\QueueItem;
use Loevgaard\DandomainFoundationBundle\Repository\QueueRepositoryInterface;

abstract class Enqueuer implements EnqueuerInterface
{
    /**
     * @var QueueRepositoryInterface
     */
    protected $queueRepository;

    public function __construct(QueueRepositoryInterface $queueRepository)
    {
        $this->queueRepository = $queueRepository;
    }

    /**
     * @param string $identifier
     * @param string $type
     * @return QueueItemInterface
     */
    protected function _enqueue(string $identifier, string $type) : QueueItemInterface
    {
        $queueItem = QueueItem::create($identifier, $type);

        $this->queueRepository->save($queueItem);

        return $queueItem;
    }
}
