<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Media implements MediaInterface
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
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $height;

    /**
     * @var array
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $mediaTranslations;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortorder;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnail;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailheight;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailwidth;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $width;

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
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * {@inheritdoc}
     */
    public function setHeight($height)
    {
        $this->height = $height;

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
    public function getMediaTranslations()
    {
        return $this->mediaTranslations;
    }

    /**
     * {@inheritdoc}
     */
    public function setMediaTranslations($mediaTranslations)
    {
        $this->mediaTranslations = $mediaTranslations;

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

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * {@inheritdoc}
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * {@inheritdoc}
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getThumbnailheight()
    {
        return $this->thumbnailheight;
    }

    /**
     * {@inheritdoc}
     */
    public function setThumbnailheight($thumbnailheight)
    {
        $this->thumbnailheight = $thumbnailheight;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getThumbnailwidth()
    {
        return $this->thumbnailwidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setThumbnailwidth($thumbnailwidth)
    {
        $this->thumbnailwidth = $thumbnailwidth;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * {@inheritdoc}
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }
}
