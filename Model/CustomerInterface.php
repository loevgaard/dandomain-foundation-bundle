<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CustomerInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     *
     * @return CustomerInterface
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getAddress2();

    /**
     * @param string $address2
     *
     * @return CustomerInterface
     */
    public function setAddress2($address2);

    /**
     * @return string
     */
    public function getAttention();

    /**
     * @param string $attention
     *
     * @return CustomerInterface
     */
    public function setAttention($attention);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     *
     * @return CustomerInterface
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     *
     * @return CustomerInterface
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getEan();

    /**
     * @param string $ean
     *
     * @return CustomerInterface
     */
    public function setEan($ean);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     *
     * @return CustomerInterface
     */
    public function setEmail($email);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return CustomerInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFax();

    /**
     * @param string $fax
     *
     * @return CustomerInterface
     */
    public function setFax($fax);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return CustomerInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     *
     * @return CustomerInterface
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $state
     *
     * @return CustomerInterface
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @param string $zipCode
     *
     * @return CustomerInterface
     */
    public function setZipCode($zipCode);

    /**
     * @return string
     */
    public function getCvr();

    /**
     * @param string $cvr
     * @return CustomerInterface
     */
    public function setCvr($cvr);

    /**
     * @return string
     */
    public function getB2bGroupId();

    /**
     * @param string $b2bGroupId
     * @return CustomerInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * @return string
     */
    public function getComments();

    /**
     * @param string $comments
     * @return CustomerInterface
     */
    public function setComments($comments);

    /**
     * @return int
     */
    public function getCountryId();

    /**
     * @param int $countryId
     * @return CustomerInterface
     */
    public function setCountryId($countryId);

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDate();

    /**
     * @param \DateTimeInterface $createdDate
     * @return CustomerInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * @return string
     */
    public function getCustomerGroupId();

    /**
     * @param string $customerGroupId
     * @return CustomerInterface
     */
    public function setCustomerGroupId($customerGroupId);

    /**
     * @return string
     */
    public function getCustomerType();

    /**
     * @param string $customerType
     * @return CustomerInterface
     */
    public function setCustomerType($customerType);

    /**
     * @return bool
     */
    public function isB2b();

    /**
     * @param bool $b2b
     * @return CustomerInterface
     */
    public function setB2b($b2b);

    /**
     * @return \DateTimeInterface
     */
    public function getLastLoginDate();

    /**
     * @param \DateTimeInterface $lastLoginDate
     * @return CustomerInterface
     */
    public function setLastLoginDate($lastLoginDate);

    /**
     * @return int
     */
    public function getLoginCount();

    /**
     * @param int $loginCount
     * @return CustomerInterface
     */
    public function setLoginCount($loginCount);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param string $password
     * @return CustomerInterface
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getReservedField1();

    /**
     * @param string $reservedField1
     * @return CustomerInterface
     */
    public function setReservedField1($reservedField1);

    /**
     * @return string
     */
    public function getReservedField2();

    /**
     * @param string $reservedField2
     * @return CustomerInterface
     */
    public function setReservedField2($reservedField2);

    /**
     * @return string
     */
    public function getReservedField3();

    /**
     * @param string $reservedField3
     * @return CustomerInterface
     */
    public function setReservedField3($reservedField3);

    /**
     * @return string
     */
    public function getReservedField4();

    /**
     * @param string $reservedField4
     * @return CustomerInterface
     */
    public function setReservedField4($reservedField4);

    /**
     * @return string
     */
    public function getReservedField5();

    /**
     * @param string $reservedField5
     * @return CustomerInterface
     */
    public function setReservedField5($reservedField5);
}
