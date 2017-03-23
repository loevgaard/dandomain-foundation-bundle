<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Delivery implements DeliveryInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $attention;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $address2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $country;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $countryId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $cvr;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $ean;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $fax;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $state;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $zipCode;

    /**
     * {@inheritdoc}
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * {@inheritdoc}
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
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
    public function getCvr()
    {
        return $this->cvr;
    }

    /**
     * {@inheritdoc}
     */
    public function setCvr($cvr)
    {
        $this->cvr = $cvr;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * {@inheritdoc}
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * {@inheritdoc}
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * {@inheritdoc}
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * {@inheritdoc}
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }
}
