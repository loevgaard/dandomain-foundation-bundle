<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductRelation implements ProductRelationInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $products;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $productNumber;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $relatedType;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * To string.
     */
    public function __toString()
    {
        return (string) $this->id;
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
    public function addProduct(ProductInterface $product)
    {
        if (!($this->products->contains($product))) {
            $this->products[] = $product;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProduct(ProductInterface $product)
    {
        $this->products->removeElement($product);

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
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRelatedType()
    {
        return $this->relatedType;
    }

    /**
     * {@inheritdoc}
     */
    public function setRelatedType($relatedType)
    {
        $this->relatedType = $relatedType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * {@inheritdoc}
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }
}
