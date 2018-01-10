<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

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

    protected function _enqueue($identifier, string $type) {
        $queueItem = QueueItem::create($identifier, $type);

        $this->queueRepository->save($queueItem);
    }
}
