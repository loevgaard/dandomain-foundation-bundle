<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

interface TagInterface
{
    /**
     * @param TagValue $tagValue
     * @return $this
     */
    public function addTagValue(TagValue $tagValue);

    /**
     * @return $this
     */
    public function clearTagValues();

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return Tag
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getSelectorType();

    /**
     * @param string $selectorType
     * @return Tag
     */
    public function setSelectorType($selectorType);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     * @return Tag
     */
    public function setSortOrder($sortOrder);

    /**
     * @return TagValue[]
     */
    public function getTagValues();

    /**
     * @param TagValue[] $tagValues
     * @return Tag
     */
    public function setTagValues($tagValues);
}