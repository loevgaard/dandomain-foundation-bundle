<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface StateInterface
{
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
     * Get isDefault.
     *
     * @return bool
     */
    public function getIsDefault();

    /**
     * Set isDefault.
     *
     * @param bool $isDefault
     *
     * @return StateInterface
     */
    public function setIsDefault($isDefault);

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
