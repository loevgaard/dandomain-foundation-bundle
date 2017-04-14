<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PeriodInterface
{
    /**
     * Get disabled.
     *
     * @return bool
     */
    public function getDisabled();

    /**
     * Set disabled.
     *
     * @param bool $disabled
     *
     * @return PeriodInterface
     */
    public function setDisabled($disabled);

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate();

    /**
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return PeriodInterface
     */
    public function setEndDate($endDate);

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
     * @return PeriodInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return PeriodInterface
     */
    public function setStartDate($startDate);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return PeriodInterface
     */
    public function setTitle($title);
}
