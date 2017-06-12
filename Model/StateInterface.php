<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface StateInterface
{
    /**
     * @return bool
     */
    public function getExclStatistics();

    /**
     * @param bool $exclStatistics
     *
     * @return StateInterface
     */
    public function setExclStatistics($exclStatistics);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return StateInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return bool
     */
    public function getIsDefault();

    /**
     * @param bool $isDefault
     *
     * @return StateInterface
     */
    public function setIsDefault($isDefault);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return StateInterface
     */
    public function setName($name);
}
