<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Symfony\Component\OptionsResolver\OptionsResolver;

interface SynchronizerInterface
{
    public function syncOne(array $options = []);
    public function syncAll(array $options = []);

    /**
     * Configures the options resolver for the syncOne method
     *
     * @param OptionsResolver $optionsResolver
     * @return void
     */
    public function configureOptionsOne(OptionsResolver $optionsResolver);

    /**
     * Configures the options resolver for the syncAll method
     *
     * @param OptionsResolver $optionsResolver
     * @return void
     */
    public function configureOptionsAll(OptionsResolver $optionsResolver);
}
