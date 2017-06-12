<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CustomerInterface
{
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
     * @return int
     */
    public function getId();

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
}
