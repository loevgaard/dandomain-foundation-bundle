<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;
use Loevgaard\DandomainFoundationBundle\Model\OrderLine;
use Loevgaard\DandomainFoundationBundle\Model\OrderLineInterface;

class OrderLineSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderLine';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderLineInterface';

    /**
     * @var ProductSynchronizer
     */
    protected $productSynchronizer;

    /**
     * @param ProductSynchronizer $productSynchronizer
     *
     * @return OrderLineSynchronizer
     */
    public function setProductSynchronizer(ProductSynchronizer $productSynchronizer)
    {
        $this->productSynchronizer = $productSynchronizer;

        return $this;
    }

    /**
     * Synchronizes OrderLine.
     *
     * @param \stdClass      $orderLine
     * @param OrderInterface $order
     * @param bool           $flush
     *
     * @return OrderLineInterface
     */
    public function syncOrderLine($orderLine, OrderInterface $order, $flush = true)
    {
        /** @var OrderLine $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $orderLine->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($orderLine->id ? : null)
            ->setFileUrl($orderLine->fileUrl ? : null)
            ->setOrder($order)
            ->setProductNumber($orderLine->productId ? : null)
            ->setProductName($orderLine->productName ? : null)
            ->setQuantity($orderLine->quantity ? : null)
            ->setTotalPrice($orderLine->totalPrice ? : null)
            ->setUnitPrice($orderLine->unitPrice ? : null)
            ->setVatPct($orderLine->vatPct ? : null)
            ->setVariant($orderLine->variant ? : null)
            ->setXmlParams($orderLine->xmlParams ? : null)
        ;

        if ($orderLine->productId) {
            $product = $this->productSynchronizer->syncProduct($orderLine->productId, $flush);
            $entity->setProduct($product);
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
