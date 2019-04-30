<?php


class Shopware_Controllers_Frontend_Test extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $anon = new \ShopwareAnonymizer\Anonymizer\Anonymizer();
        $user = $this->getModelManager()->getRepository(\Shopware\Models\Customer\Customer::class);



    }
}