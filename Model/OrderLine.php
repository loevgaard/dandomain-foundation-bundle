<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class OrderLine implements OrderLineInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Order
     */
    protected $order;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $fileUrl;

    /**
     * @var Product
     */
    protected $product;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $productNumber;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $productName;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $quantity;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $totalPrice;

    /**
     * @var float
     *
     * @ORM\Column(nullable=true, type="decimal")
     */
    protected $unitPrice;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $vatPct;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $variant;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $xmlParams;

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * {@inheritdoc}
     */
    public function setOrder(OrderInterface $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * {@inheritdoc}
     */
    public function setProduct(ProductInterface $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductNumber($productId)
    {
        $this->productNumber = $productId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * {@inheritdoc}
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * {@inheritdoc}
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVatPct()
    {
        return $this->vatPct;
    }

    /**
     * {@inheritdoc}
     */
    public function setVatPct($vatPct)
    {
        $this->vatPct = $vatPct;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * {@inheritdoc}
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getXmlParams()
    {
        return $this->xmlParams;
    }

    /**
     * {@inheritdoc}
     */
    public function setXmlParams($xmlParams)
    {
        $this->xmlParams = $xmlParams;

        return $this;
    }
}
