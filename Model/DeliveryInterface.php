<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface DeliveryInterface
{
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
     * @return DeliveryInterface
     */
    public function setAttention($attention);

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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
     */
    public function setAddress2($address2);

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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
     */
    public function setCountry($country);

    /**
     * Get countryId
     *
     * @return integer
     */
    public function getCountryId();

    /**
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return DeliveryInterface
     */
    public function setCountryId($countryId);

    /**
     * Get cvr
     *
     * @return string
     */
    public function getCvr();

    /**
     * Set cvr
     *
     * @param string $cvr
     *
     * @return DeliveryInterface
     */
    public function setCvr($cvr);

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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
     */
    public function setEmail($email);

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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
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
     * @return DeliveryInterface
     */
    public function setZipCode($zipCode);
}
