<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductType implements ProductTypeInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $productTypeFields;

    /**
     * @var ArrayCollection
     */
    protected $productTypeFormulas;

    /**
     * @var ArrayCollection
     */
    protected $productTypeVats;

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
    protected $name;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->productTypeFields = new ArrayCollection();
        $this->productTypeFormulas = new ArrayCollection();
        $this->productTypeVats = new ArrayCollection();
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
    public function addProductTypeField(ProductTypeFieldInterface $productTypeField)
    {
        if (!($this->productTypeFields->contains($productTypeField))) {
            $this->productTypeFields[] = $productTypeField;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductTypeFields()
    {
        return $this->productTypeFields;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProductTypeField(ProductTypeFieldInterface $productTypeField)
    {
        $this->productTypeFields->removeElement($productTypeField);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addProductTypeFormula(ProductTypeFormulaInterface $productTypeFormula)
    {
        if (!($this->productTypeFormulas->contains($productTypeFormula))) {
            $this->productTypeFormulas[] = $productTypeFormula;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductTypeFormulas()
    {
        return $this->productTypeFormulas;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProductTypeFormula(ProductTypeFormulaInterface $productTypeFormula)
    {
        $this->productTypeFormulas->removeElement($productTypeFormula);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addProductTypeVat(ProductTypeVatInterface $productTypeVat)
    {
        if (!($this->productTypeVats->contains($productTypeVat))) {
            $this->productTypeVats[] = $productTypeVat;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductTypeVats()
    {
        return $this->productTypeVats;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProductTypeVat(ProductTypeVatInterface $productTypeVat)
    {
        $this->productTypeVats->removeElement($productTypeVat);

        return $this;
    }
}
