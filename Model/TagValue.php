<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\MappedSuperclass()
 **/
abstract class TagValue implements TagValueInterface, TranslatableInterface
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Column(type="integer", unique=true)
     * @var int
     **/
    protected $externalId;

    /**
     * @ORM\Column(type="integer")
     * @var int
     **/
    protected $sortOrder;

    /**
     * @var Tag
     */
    protected $tag;

    public function __toString()
    {
        return (string)$this->externalId;
    }

    /**
     * @inheritdoc
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @inheritdoc
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @inheritdoc
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @inheritdoc
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }
}