<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class ProductTypeVat implements ProductTypeVatInterface
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
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $country;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $countryId;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $siteId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $vatPct;

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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

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
}
