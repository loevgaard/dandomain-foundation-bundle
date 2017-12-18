<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface DeliveryInterface
{
    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     *
     * @return DeliveryInterface
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getAddress2();

    /**
     * @param string $address2
     *
     * @return DeliveryInterface
     */
    public function setAddress2($address2);

    /**
     * @return string
     */
    public function getAttention();

    /**
     * @param string $attention
     *
     * @return DeliveryInterface
     */
    public function setAttention($attention);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     *
     * @return DeliveryInterface
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     *
     * @return DeliveryInterface
     */
    public function setCountry($country);

    /**
     * @return int
     */
    public function getCountryId();

    /**
     * @param int $countryId
     *
     * @return DeliveryInterface
     */
    public function setCountryId($countryId);

    /**
     * @return string
     */
    public function getCvr();

    /**
     * @param string $cvr
     *
     * @return DeliveryInterface
     */
    public function setCvr($cvr);

    /**
     * @return string
     */
    public function getEan();

    /**
     * @param string $ean
     *
     * @return DeliveryInterface
     */
    public function setEan($ean);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     *
     * @return DeliveryInterface
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getFax();

    /**
     * @param string $fax
     *
     * @return DeliveryInterface
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
     * @return DeliveryInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     *
     * @return DeliveryInterface
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $state
     *
     * @return DeliveryInterface
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @param string $zipCode
     *
     * @return DeliveryInterface
     */
    public function setZipCode($zipCode);
}
