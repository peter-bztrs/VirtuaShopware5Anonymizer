<?php


class Shopware_Controllers_Frontend_Test extends Enlight_Controller_Action
{
    public function indexAction()
    {
//        $customer = new \ShopwareAnonymizer\Anonymizer\Bridge\Entity\Customer('some seed');
        $anonymizer = new \ShopwareAnonymizer\Anonymizer\Anonymizer();
        $anonymizer->anonymizeAll();
    }
}