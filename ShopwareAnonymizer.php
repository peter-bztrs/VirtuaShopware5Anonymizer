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
            'Enlight_Controller_Front_StartDispatch' => 'onFrontStartDispatch',
//            todo remove testController after making plugin
            'Enlight_Controller_Action_PreDispatch' => 'testController',
//           todo add console command
//            'Shopware_Console_Add_Command' => 'onFrontStartDispatch',
        ];
    }

    public function testController(\Enlight_Controller_ActionEventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir($this->getPath() . '/Resources/views/');
    }

    public function onFrontStartDispatch(\Enlight_Event_EventArgs $args)
    {
        require_once $this->getPath() . '/vendor/autoload.php';
    }

}
