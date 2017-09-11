<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Symfony\Component\Console\Output\OutputInterface;

interface ServiceInterface
{
    /**
     * @param OutputInterface $output
     *
     * @return $this
     */
    public function setOutput(OutputInterface $output);

    /**
     * @return OutputInterface
     */
    public function getOutput();

    /**
     * @param array $options
     * @return void
     */
    public function syncAll(array $options = []);

    /**
     * @param array $options
     * @return void
     */
    public function syncOne(array $options = []);
}
