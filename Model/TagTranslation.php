<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\MappedSuperclass()
 */
abstract class TagTranslation implements TagTranslationInterface
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $text;

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @inheritdoc
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}