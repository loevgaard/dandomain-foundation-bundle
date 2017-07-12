<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\MappedSuperclass()
 **/
abstract class Tag implements TagInterface, TranslatableInterface
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     **/
    protected $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     * @var int
     **/
    protected $externalId;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $selectorType;

    /**
     * @ORM\Column(type="integer")
     * @var int
     **/
    protected $sortOrder;

    /**
     * @var TagValue[]
     */
    protected $tagValues;

    public function __construct()
    {
        $this->tagValues = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function addTagValue(TagValue $tagValue) {
        if(!$this->tagValues->contains($tagValue)) {
            $this->tagValues->add($tagValue);
            $tagValue->setTag($this);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function clearTagValues() {
        foreach($this->tagValues as $tagValue) {
            /** @var $tagValue TagValue */
            $this->tagValues->removeElement($tagValue);
        }

        return $this;
    }

    public function __toString()
    {
        return (string)$this->externalId;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
    public function getSelectorType()
    {
        return $this->selectorType;
    }

    /**
     * @inheritdoc
     */
    public function setSelectorType($selectorType)
    {
        $this->selectorType = $selectorType;
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
    public function getTagValues()
    {
        return $this->tagValues;
    }

    /**
     * @inheritdoc
     */
    public function setTagValues($tagValues)
    {
        $this->tagValues = $tagValues;
        return $this;
    }
}