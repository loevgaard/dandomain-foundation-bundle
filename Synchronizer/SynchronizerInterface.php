<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Psr\Log\LoggerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface SynchronizerInterface
{
    public function syncOne(array $options = []);

    public function syncAll(array $options = []);

    /**
     * Configures the options resolver for the syncOne method.
     *
     * @param OptionsResolver $optionsResolver
     */
    public function configureOptionsOne(OptionsResolver $optionsResolver);

    /**
     * Configures the options resolver for the syncAll method.
     *
     * @param OptionsResolver $optionsResolver
     */
    public function configureOptionsAll(OptionsResolver $optionsResolver);

    /**
     * Reads the log for this synchronizer service
     * This lets you output synchronizer results in other parts of your application.
     *
     * @return array
     */
    public function readLog(): array;

    /**
     * @param LoggerInterface $logger
     *
     * @return mixed
     */
    public function setLogger(LoggerInterface $logger);
}
