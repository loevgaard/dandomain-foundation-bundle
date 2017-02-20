<?php
namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Doctrine\Common\Collections\ArrayCollection;

class Result
{
    /** @var ArrayCollection|string[] */
    protected $messages;

    /** @var bool  */
    protected $error = false;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function addMessage($message) {
        $this->messages->add($message);
        return $this;
    }

    /**
     * @return ArrayCollection|\string[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param ArrayCollection|\string[] $messages
     * @return Result
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isError()
    {
        return $this->error;
    }

    /**
     * @param boolean $error
     * @return Result
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }
}