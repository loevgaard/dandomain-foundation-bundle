<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CustomerInterface
{
    /**
     * Get address
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set address
     *
     * @param string $address
     *
     * @return CustomerInterface
     */
    public function setAddress($address);

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2();

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return CustomerInterface
     */
    public function setAddress2($address2);

    /**
     * Get attention
     *
     * @return string
     */
    public function getAttention();

    /**
     * Set attention
     *
     * @param string $attention
     *
     * @return CustomerInterface
     */
    public function setAttention($attention);

    /**
     * Get city
     *
     * @return string
     */
    public function getCity();

    /**
     * Set city
     *
     * @param string $city
     *
     * @return CustomerInterface
     */
    public function setCity($city);

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set country
     *
     * @param string $country
     *
     * @return CustomerInterface
     */
    public function setCountry($country);

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan();

    /**
     * Set ean
     *
     * @param string $ean
     *
     * @return CustomerInterface
     */
    public function setEan($ean);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CustomerInterface
     */
    public function setEmail($email);

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return CustomerInterface
     */
    public function setExternalId($externalId);

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax();

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return CustomerInterface
     */
    public function setFax($fax);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CustomerInterface
     */
    public function setName($name);

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return CustomerInterface
     */
    public function setPhone($phone);

    /**
     * Get state
     *
     * @return string
     */
    public function getState();

    /**
     * Set state
     *
     * @param string $state
     *
     * @return CustomerInterface
     */
    public function setState($state);

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode();

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return CustomerInterface
     */
    public function setZipCode($zipCode);
}
