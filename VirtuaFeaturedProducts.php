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

    public function install(InstallContext $context)
    {
        $crudService = $this->container->get('shopware_attribute.crud_service');
        $crudService->update(
            's_articles_attributes',
            'is_featured',
            'boolean',
            [
                'displayInBackend' => true,
                'label' => 'is Featured',
            ],
            null,
            false,
            false
        );
    }

    public function uninstall(UninstallContext $context)
    {
        if ($context->keepUserData()) {
            return;
        }

        $crudService = $this->container->get('shopware_attribute.crud_service');
        $crudService->delete(
            's_articles_attributes',
            'is_featured'
        );
    }

}
