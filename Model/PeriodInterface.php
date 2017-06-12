<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface PeriodInterface
{
    /**
     * @return bool
     */
    public function getDisabled();

    /**
     * @param bool $disabled
     *
     * @return PeriodInterface
     */
    public function setDisabled($disabled);

    /**
     * @return \DateTime
     */
    public function getEndDate();

    /**
     * @param \DateTime $endDate
     *
     * @return PeriodInterface
     */
    public function setEndDate($endDate);

    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return PeriodInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * @param \DateTime $startDate
     *
     * @return PeriodInterface
     */
    public function setStartDate($startDate);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     *
     * @return PeriodInterface
     */
    public function setTitle($title);
}
