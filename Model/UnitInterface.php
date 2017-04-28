<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface UnitInterface
{
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
     * @return UnitInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get text
     *
     * @return string
     */
    public function getText();

    /**
     * Set text
     *
     * @param string $text
     *
     * @return UnitInterface
     */
    public function setText($text);
}
