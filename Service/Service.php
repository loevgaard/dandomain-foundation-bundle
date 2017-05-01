<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Service
{
    /** @var OutputInterface */
    private $output;

    /**
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @return OutputInterface
     */
    public function getOutput()
    {
        if(is_null($this->output)) {
            $this->output = new NullOutput();
        }

        return $this->output;
    }
}