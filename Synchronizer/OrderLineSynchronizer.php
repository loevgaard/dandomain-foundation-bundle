<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\OrderInterface;
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
     * Synchronizes OrderLine.
     *
     * @param array          $orderLine
     * @param OrderInterface $order
     * @param bool           $flush
     *
     * @return OrderLineInterface
     */
    public function syncOrderLine($orderLine, OrderInterface $order, $flush = true)
    {
        if (is_numeric($orderLine)) {
            $orderLine = \GuzzleHttp\json_decode($this->api->orderLine->getOrderLine($orderLine)->getBody()->getContents());
        }

        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $orderLine->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($orderLine->id)
            ->setFileUrl($orderLine->fileUrl)
            ->setOrder($order)
            ->setProductId($orderLine->productId)
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
}
