<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductTypeField implements ProductTypeFieldInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $productTypes;

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
    protected $label;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $languageId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $number;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->productTypes = new ArrayCollection();
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * {@inheritdoc}
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addProductType(ProductTypeInterface $productType)
    {
        if (!($this->productTypes->contains($productType))) {
            $this->productTypes[] = $productType;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductTypes()
    {
        return $this->productTypes;
    }

    /**
     * {@inheritdoc}
     */
    public function removeProductType(ProductTypeInterface $productType)
    {
        $this->productTypes->removeElement($productType);

        return $this;
    }
}
