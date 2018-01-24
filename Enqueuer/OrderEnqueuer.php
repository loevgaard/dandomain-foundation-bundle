<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Assert\Assert;
use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\QueueItem;

class OrderEnqueuer extends Enqueuer
{
    /**
     * @param int $identifier The order id
     *
     * @return QueueItemInterface
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function enqueue($identifier): QueueItemInterface
    {
        Assert::that($identifier)->integerish('The $identifier has to be an int, i.e. the order id');

        return $this->_enqueue((string) $identifier, QueueItem::TYPE_ORDER);
    }
}
