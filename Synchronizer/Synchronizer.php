<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Synchronizer implements SynchronizerInterface
{
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var array
     */
    protected $options;

    /**
     * @param RepositoryInterface $repository
     * @param Api $api
     */
    public function __construct(RepositoryInterface $repository, Api $api)
    {
        $this->repository = $repository;
        $this->api = $api;
    }

    /**
     * @param array $options
     * @param callable $optionsConfigurator
     * @return array
     */
    protected function resolveOptions(array $options = [], callable $optionsConfigurator) : array
    {
        $resolver = new OptionsResolver();
        call_user_func_array($optionsConfigurator, [$resolver]);
        return $resolver->resolve($options);
    }
}
