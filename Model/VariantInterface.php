<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface VariantInterface
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
     * @return VariantInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return VariantInterface
     */
    public function setSortOrder($sortOrder);

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
     * @return VariantInterface
     */
    public function setText($text);
}
