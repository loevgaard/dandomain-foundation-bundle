<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

use Assert\Assert;
use Loevgaard\DandomainFoundation\Entity\QueueItem;

class ProductEnqueuer extends Enqueuer
{
    /**
     * @param string $identifier The product number
     */
    public function enqueue($identifier) {
        Assert::that($identifier)->string('The $identifier has to be a string, i.e. the product number');

        $this->_enqueue($identifier, QueueItem::TYPE_PRODUCT);
    }
}
