<?php

namespace VirtuaFeaturedProducts;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin VirtuaFeaturedProducts.
 */
class VirtuaFeaturedProducts extends Plugin
{
    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('virtua_featured_products.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
