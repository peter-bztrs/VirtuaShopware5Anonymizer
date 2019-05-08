<?php

namespace ShopwareAnonymizer;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin ShopwareAnonymizer.
 */
class ShopwareAnonymizer extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Front_StartDispatch' => 'registerVendor',
//            todo remove testController after making plugin
            'Enlight_Controller_Action_PreDispatch' => 'testController',
            'Shopware_Console_Add_Command'=>'registerVendor',
        ];
    }

    public function testController(\Enlight_Controller_ActionEventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir($this->getPath() . '/Resources/views/');
    }

    public function registerVendor(\Enlight_Event_EventArgs $args)
    {
        require_once $this->getPath() . '/vendor/autoload.php';
    }

}
