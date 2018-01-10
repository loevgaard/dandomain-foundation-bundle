<?php

namespace Loevgaard\DandomainFoundationBundle\Enqueuer;

interface EnqueuerInterface
{
    /**
     * This will enqueue the item with the given $identifier
     * The $identifier can differ depending on what type is enqueued
     * For orders the $identifier is the order id where as for products it is the product number
     *
     * @param $identifier
     * @return void
     */
    public function enqueue($identifier);
}
