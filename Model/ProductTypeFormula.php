<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductTypeFormula implements ProductTypeFormulaInterface
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
    protected $formula;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $productTypeGroupId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

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
    public function getFormula()
    {
        return $this->formula;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormula($formula)
    {
        $this->formula = $formula;

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

    /**
     * {@inheritdoc}
     */
    public function getProductTypeGroupId()
    {
        return $this->productTypeGroupId;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductTypeGroupId($productTypeGroupId)
    {
        $this->productTypeGroupId = $productTypeGroupId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * {@inheritdoc}
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;

        return $this;
    }
}
