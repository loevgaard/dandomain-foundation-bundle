<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

interface TagValueTranslationInterface
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return TagValueTranslation
     */
    public function setText($text);
}