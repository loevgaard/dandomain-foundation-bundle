<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface UnitInterface
{
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
     * @return UnitInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get text.
     *
     * @return string
     */
    public function getText();

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return UnitInterface
     */
    public function setText($text);
}
