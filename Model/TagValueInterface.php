<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

/**
 * @ORM\MappedSuperclass()
 **/
interface TagValueInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return TagValue
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return TagValue
     */
    public function setSortOrder($sortOrder);

    /**
     * @return Tag
     */
    public function getTag();

    /**
     * @param Tag $tag
     *
     * @return TagValue
     */
    public function setTag($tag);
}
