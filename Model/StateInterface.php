<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface StateInterface
{
    /**
     * Get default
     *
     * @return boolean
     */
    public function getDefault();

    /**
     * Set default
     *
     * @param boolean $default
     *
     * @return StateInterface
     */
    public function setDefault($default);

    /**
     * Get exclStatistics
     *
     * @return boolean
     */
    public function getExclStatistics();

    /**
     * Set exclStatistics
     *
     * @param boolean $exclStatistics
     *
     * @return StateInterface
     */
    public function setExclStatistics($exclStatistics);

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
     * @return StateInterface
     */
    public function setExternalId($externalId);

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
     * @return StateInterface
     */
    public function setName($name);
}
