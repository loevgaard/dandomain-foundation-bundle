<?php

namespace Loevgaard\DandomainFoundationBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class LoevgaardDandomainFoundationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('loevgaard_dandomain_foundation.category_class', $config['category_class']);
        $container->setParameter('loevgaard_dandomain_foundation.customer_class', $config['customer_class']);
        $container->setParameter('loevgaard_dandomain_foundation.default_site_id', $config['default_site_id']);
        $container->setParameter('loevgaard_dandomain_foundation.delivery_class', $config['delivery_class']);
        $container->setParameter('loevgaard_dandomain_foundation.invoice_class', $config['invoice_class']);
        $container->setParameter('loevgaard_dandomain_foundation.manufacturer_class', $config['manufacturer_class']);
        $container->setParameter('loevgaard_dandomain_foundation.media_class', $config['media_class']);
        $container->setParameter('loevgaard_dandomain_foundation.order_class', $config['order_class']);
        $container->setParameter('loevgaard_dandomain_foundation.order_line_class', $config['order_line_class']);
        $container->setParameter('loevgaard_dandomain_foundation.payment_method_class', $config['payment_method_class']);
        $container->setParameter('loevgaard_dandomain_foundation.period_class', $config['period_class']);
        $container->setParameter('loevgaard_dandomain_foundation.price_class', $config['price_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_class', $config['product_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_relation_class', $config['product_relation_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_type_class', $config['product_type_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_type_field_class', $config['product_type_field_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_type_formula_class', $config['product_type_formula_class']);
        $container->setParameter('loevgaard_dandomain_foundation.product_type_vat_class', $config['product_type_vat_class']);
        $container->setParameter('loevgaard_dandomain_foundation.segment_class', $config['segment_class']);
        $container->setParameter('loevgaard_dandomain_foundation.shipping_method_class', $config['shipping_method_class']);
        $container->setParameter('loevgaard_dandomain_foundation.site_class', $config['site_class']);
        $container->setParameter('loevgaard_dandomain_foundation.site_setting_class', $config['site_setting_class']);
        $container->setParameter('loevgaard_dandomain_foundation.state_class', $config['state_class']);
        $container->setParameter('loevgaard_dandomain_foundation.unit_class', $config['unit_class']);
        $container->setParameter('loevgaard_dandomain_foundation.variant_class', $config['variant_class']);
        $container->setParameter('loevgaard_dandomain_foundation.variant_group_class', $config['variant_group_class']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
