<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

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
            'Shopware_Console_Add_Command'=>'registerVendor',
//            todo remove after complete manual testing
            'Enlight_Controller_Front_StartDispatch' => 'registerVendor',
//            todo remove after complete manual testing
            'Enlight_Controller_Action_PreDispatch' => 'testController',
        ];
    }

    //todo remove after complete manual testing
    public function testController(\Enlight_Controller_ActionEventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir($this->getPath() . '/Resources/views/');
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function registerVendor(\Enlight_Event_EventArgs $args)
    {
        require_once $this->getPath() . '/vendor/autoload.php';
    }
}
