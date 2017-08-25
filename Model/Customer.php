<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Customer implements CustomerInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @todo We added nullable=true because this bundle is also used together with the Dandomain Payment API
     * and the customer id is not sent in the POST request from the Payment API, which means we need to be able to
     * create a customer without an id
     *
     * @var int
     *
     * @ORM\Column(type="integer", unique=true, nullable=true)
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $address2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $attention;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $ean;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $fax;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $state;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $cvr;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $comments;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $countryId;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customerGroupId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customerType;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $b2b;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $lastLoginDate;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $loginCount;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField1;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField2;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField3;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField4;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $reservedField5;

    /**
     * @inheritdoc
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @inheritdoc
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @inheritdoc
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * @inheritdoc
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @inheritdoc
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @inheritdoc
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @inheritdoc
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @inheritdoc
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @inheritdoc
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @inheritdoc
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @inheritdoc
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @inheritdoc
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCvr()
    {
        return $this->cvr;
    }

    /**
     * @inheritdoc
     */
    public function setCvr($cvr)
    {
        $this->cvr = $cvr;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getB2bGroupId()
    {
        return $this->b2bGroupId;
    }

    /**
     * @inheritdoc
     */
    public function setB2bGroupId($b2bGroupId)
    {
        $this->b2bGroupId = $b2bGroupId;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @inheritdoc
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @inheritdoc
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @inheritdoc
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @inheritdoc
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->customerGroupId = $customerGroupId;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCustomerType()
    {
        return $this->customerType;
    }

    /**
     * @inheritdoc
     */
    public function setCustomerType($customerType)
    {
        $this->customerType = $customerType;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isB2b()
    {
        return $this->b2b;
    }

    /**
     * @inheritdoc
     */
    public function setB2b($b2b)
    {
        $this->b2b = $b2b;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * @inheritdoc
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLoginCount()
    {
        return $this->loginCount;
    }

    /**
     * @inheritdoc
     */
    public function setLoginCount($loginCount)
    {
        $this->loginCount = $loginCount;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritdoc
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReservedField1()
    {
        return $this->reservedField1;
    }

    /**
     * @inheritdoc
     */
    public function setReservedField1($reservedField1)
    {
        $this->reservedField1 = $reservedField1;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReservedField2()
    {
        return $this->reservedField2;
    }

    /**
     * @inheritdoc
     */
    public function setReservedField2($reservedField2)
    {
        $this->reservedField2 = $reservedField2;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReservedField3()
    {
        return $this->reservedField3;
    }

    /**
     * @inheritdoc
     */
    public function setReservedField3($reservedField3)
    {
        $this->reservedField3 = $reservedField3;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReservedField4()
    {
        return $this->reservedField4;
    }

    /**
     * @inheritdoc
     */
    public function setReservedField4($reservedField4)
    {
        $this->reservedField4 = $reservedField4;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReservedField5()
    {
        return $this->reservedField5;
    }

    /**
     * @inheritdoc
     */
    public function setReservedField5($reservedField5)
    {
        $this->reservedField5 = $reservedField5;
        return $this;
    }
}
