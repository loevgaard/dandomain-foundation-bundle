<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface StateInterface
{
    /**
     * Get default.
     *
     * @return bool
     */
    public function getDefault();

    /**
     * Set default.
     *
     * @param bool $default
     *
     * @return StateInterface
     */
    public function setDefault($default);

    /**
     * Get exclStatistics.
     *
     * @return bool
     */
    public function getExclStatistics();

    /**
     * Set exclStatistics.
     *
     * @param bool $exclStatistics
     *
     * @return StateInterface
     */
    public function setExclStatistics($exclStatistics);

    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return StateInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return StateInterface
     */
    public function setName($name);
}
