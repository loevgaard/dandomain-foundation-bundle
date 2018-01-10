<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Assert\Assert;
use Loevgaard\DandomainFoundation\Entity\QueueItem;

class OrderEnqueuer extends Enqueuer
{
    /**
     * @param int $identifier The order id
     */
    public function enqueue($identifier) {
        Assert::that($identifier)->integerish('The $identifier has to be an int, i.e. the order id');

        $this->_enqueue($identifier, QueueItem::TYPE_ORDER);
    }
}
