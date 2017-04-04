<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ManufacturerInterface
{
    /**
     * Get externalId.
     *
     * @return string
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param string $externalId
     *
     * @return ManufacturerInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get link.
     *
     * @return string
     */
    public function getLink();

    /**
     * Set link.
     *
     * @param string $link
     *
     * @return ManufacturerInterface
     */
    public function setLink($link);

    /**
     * Get linkText.
     *
     * @return string
     */
    public function getLinkText();

    /**
     * Set linkText.
     *
     * @param string $linkText
     *
     * @return ManufacturerInterface
     */
    public function setLinkText($linkText);

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
     * @return ManufacturerInterface
     */
    public function setName($name);
}
