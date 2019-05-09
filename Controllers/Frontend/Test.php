<?php

//todo remove after all manual tests
class Shopware_Controllers_Frontend_Test extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $res = $this->getModelManager()->getDBALQueryBuilder()
            ->select(['a.' . 'additional_address_line1'])
            ->from('s_user_addresses', 'a')
            ->execute()
            ->fetchAll();
        dump($res);
//        $anonymizer = new \ShopwareAnonymizer\Anonymizer\Anonymizer();
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