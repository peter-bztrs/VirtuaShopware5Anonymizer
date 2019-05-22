<?php

use WalleePayment\Components\Controller\Backend;

class Shopware_Controllers_Backend_Anonymize extends \Shopware_Controllers_Backend_ExtJs
{
    public function anonymizeAction()
    {
        try {
            $this->container->get('shopware_anonymizer.commands.anonymize_command');
            $this->view->assign([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            $this->view->assign([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
