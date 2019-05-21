<?php

namespace VirtuaShopwareAnonymizer;

use Shopware\Components\Plugin;

/**
 * Shopware-Plugin VirtuaShopwareAnonymizer.
 */
class VirtuaShopwareAnonymizer extends Plugin
{
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
    public function registerVendor(\Enlight_Event_EventArgs $args)
    {
        if (file_exists($this->getPath() . '/vendor/autoload.php')) {
            require_once $this->getPath() . '/vendor/autoload.php';
        }
    }
}
