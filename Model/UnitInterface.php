<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface UnitInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return UnitInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     *
     * @return UnitInterface
     */
    public function setText($text);
}
