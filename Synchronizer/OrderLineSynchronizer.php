<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;
use Loevgaard\DandomainFoundationBundle\Model\OrderLine;
use Loevgaard\DandomainFoundationBundle\Model\OrderLineInterface;

class OrderLineSynchronizer extends Synchronizer
{
    /**
     * @var ProductSynchronizer
     */
    protected $productSynchronizer;

    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderLine';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\OrderLineInterface';

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

        $product = $this->productSynchronizer->syncProduct($orderLine->productId, $flush);

        $entity
            ->setExternalId($orderLine->id)
            ->setFileUrl($orderLine->fileUrl)
            ->setOrder($order)
            ->setProduct($product)
            ->setProductNumber($orderLine->productId)
            ->setProductName($orderLine->productName)
            ->setQuantity($orderLine->quantity)
            ->setTotalPrice($orderLine->totalPrice)
            ->setUnitPrice($orderLine->unitPrice)
            ->setVatPct($orderLine->vatPct)
            ->setVariant($orderLine->variant)
            ->setXmlParams($orderLine->xmlParams)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }

    /**
     * @param ProductSynchronizer $productSynchronizer
     *
     * @return $this
     */
    public function setProductSynchronizer(ProductSynchronizer $productSynchronizer)
    {
        $this->productSynchronizer = $productSynchronizer;

        return $this;
    }
}
