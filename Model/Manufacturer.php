<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Manufacturer implements ManufacturerInterface
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
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $link;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $linkText;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
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
    public function getLink()
    {
        return $this->link;
    }

    /**
     * {@inheritdoc}
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkText()
    {
        return $this->linkText;
    }

    /**
     * {@inheritdoc}
     */
    public function setLinkText($linkText)
    {
        $this->linkText = $linkText;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
    }
}
