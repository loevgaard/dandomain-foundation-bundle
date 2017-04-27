<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Variant implements VariantInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $disabledProducts;

    /**
     * @var ArrayCollection
     */
    protected $products;

    /**
     * @var ArrayCollection
     */
    protected $variantGroups;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $text;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->disabledProducts = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->variantGroups = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addDisabledProduct(ProductInterface $disabledProduct)
    {
        if (!($this->disabledProducts->contains($disabledProduct))) {
            $this->disabledProducts[] = $disabledProduct;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDisabledProducts()
    {
        return $this->disabledProducts;
    }

    /**
     * {@inheritdoc}
     */
    public function removeDisabledProduct(ProductInterface $disabledProduct)
    {
        $this->disabledProducts->removeElement($disabledProduct);

        return $this;
    }

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

    /**
     * {@inheritdoc}
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup)
    {
        if (!($this->variantGroups->contains($variantGroup))) {
            $this->variantGroups[] = $variantGroup;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVariantGroups()
    {
        return $this->variantGroups;
    }

    /**
     * {@inheritdoc}
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup)
    {
        $this->variantGroups->removeElement($variantGroup);

        return $this;
    }
}
