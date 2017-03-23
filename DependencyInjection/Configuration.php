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
                ->scalarNode('order_class')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
