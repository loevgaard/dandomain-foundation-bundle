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
//                ->scalarNode('category_translation_class')->isRequired()->end()
//                ->scalarNode('customer_class')->isRequired()->end()
//                ->scalarNode('default_site_id')->isRequired()->end()
//                ->scalarNode('delivery_class')->isRequired()->end()
//                ->scalarNode('invoice_class')->isRequired()->end()
//                ->scalarNode('manufacturer_class')->isRequired()->end()
//                ->scalarNode('media_class')->isRequired()->end()
//                ->scalarNode('order_class')->isRequired()->end()
//                ->scalarNode('order_line_class')->isRequired()->end()
//                ->scalarNode('payment_method_class')->isRequired()->end()
//                ->scalarNode('period_class')->isRequired()->end()
//                ->scalarNode('price_class')->isRequired()->end()
//                ->scalarNode('product_class')->isRequired()->end()
//                ->scalarNode('product_relation_class')->isRequired()->end()
//                ->scalarNode('product_translation_class')->isRequired()->end()
//                ->scalarNode('product_type_class')->isRequired()->end()
//                ->scalarNode('product_type_field_class')->isRequired()->end()
//                ->scalarNode('product_type_formula_class')->isRequired()->end()
//                ->scalarNode('product_type_vat_class')->isRequired()->end()
//                ->scalarNode('segment_class')->isRequired()->end()
//                ->scalarNode('shipping_method_class')->isRequired()->end()
//                ->scalarNode('site_class')->isRequired()->end()
//                ->scalarNode('state_class')->isRequired()->end()
//                ->scalarNode('unit_class')->isRequired()->end()
//                ->scalarNode('variant_class')->isRequired()->end()
//                ->scalarNode('variant_group_class')->isRequired()->end()
//                ->scalarNode('tag_class')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
