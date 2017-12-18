<?php
namespace Loevgaard\DandomainFoundationBundle\Model;

interface TagTranslationInterface
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return TagTranslation
     */
    public function setText($text);
}