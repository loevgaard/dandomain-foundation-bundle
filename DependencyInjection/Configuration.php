<?php

namespace Loevgaard\DandomainFoundationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('loevgaard_dandomain_foundation');

        $rootNode
            ->children()
                ->scalarNode('synchronizer_logs_dir')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('The directory where synchronizer logs are stored')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
