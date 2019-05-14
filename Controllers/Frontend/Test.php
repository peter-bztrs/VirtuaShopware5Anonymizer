<?php

//todo remove after all manual tests
class Shopware_Controllers_Frontend_Test extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $res = $this->getModelManager()->getConnection()->getSchemaManager()->tablesExist(['kurwa']);
        dump($res);
//        $anonymizer = new \VirtuaShopwareAnonymizer\Anonymizer\Anonymizer();
//        $anonymizer->anonymizeAll();
//        $meta = Shopware()->Container()->get('models')
//            ->getClassMetadata(\Shopware\Models\Customer\Customer::class)->getTableName();
//        dump($meta);
//        Shopware()->Container()->get('dbal_connection')->update(
//            's_user',
//            ['email' => 'dono@kucza.com'],
//            ['id' => 6]
//        );
    }
}