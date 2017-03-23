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
                ->scalarNode('customer_class')->end()
                ->scalarNode('delivery_class')->end()
                ->scalarNode('invoice_class')->end()
                ->scalarNode('order_class')->end()
                ->scalarNode('order_line_class')->end()
                ->scalarNode('payment_method_class')->end()
                ->scalarNode('shipping_method_class')->end()
                ->scalarNode('site_class')->end()
                ->scalarNode('state_class')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
