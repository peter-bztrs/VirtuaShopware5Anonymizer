<?php

namespace VirtuaShopwareAnonymizer;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin VirtuaShopwareAnonymizer.
 */
class VirtuaShopwareAnonymizer extends Plugin
{
    /**
     * Build with composer install
     */
    public function build(ContainerBuilder $container)
    {
        require_once __DIR__ . '/autoComposerInstall.php';
        parent::build($container);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Console_Add_Command' => 'registerVendor',
        ];
    }
    
    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function registerVendor()
    {
        if (file_exists($this->getPath() . '/vendor/autoload.php')) {
            require_once $this->getPath() . '/vendor/autoload.php';
        }
    }
}
