<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Assert\Assert;
use Loevgaard\DandomainFoundation\Entity\Generated\QueueItemInterface;
use Loevgaard\DandomainFoundation\Entity\QueueItem;

class ProductEnqueuer extends Enqueuer
{
    /**
     * @param string $identifier The product number
     * @return QueueItemInterface
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function enqueue($identifier) : QueueItemInterface
    {
        Assert::that($identifier)->string('The $identifier has to be a string, i.e. the product number');

        return $this->_enqueue($identifier, QueueItem::TYPE_PRODUCT);
    }
}
