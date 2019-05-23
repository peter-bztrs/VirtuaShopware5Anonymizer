<?php

use WalleePayment\Components\Controller\Backend;

class Shopware_Controllers_Backend_Anonymize extends \Shopware_Controllers_Backend_ExtJs
{
    /**
     * Add cron job which will run anonymization
     * from console
     */
    public function anonymizeAction()
    {
        try {
            $date = Zend_Date::now();
            $this->addCronJob($date);

            $this->view->assign([
                'success' => true,
                'datetime' => $date->toString('Y-m-d HH:mm:ss'),
            ]);
        } catch (\Exception $e) {
            $this->view->assign([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * @param Zend_Date $date
     * @return Enlight_Components_Cron_Job
     * @throws Zend_Date_Exception
     */
    protected function createCronJob(Zend_Date $date)
    {
        $job = new Enlight_Components_Cron_Job([
            'interval' => 1,
            'next' => $date,
            'start' => $date->subMinute(3),
            'end' => $date->addMinute(3),
            'active' => true,
            'disable_on_error' => false,
            'name' => 'VIRTUA tmp cron anonymization thread',
            'action' => 'Shopware_CronJob_VirtuaShopwareAnonymization',
        ]);
        return $job;
    }

    /**
     * @param Zend_Date $date
     * @throws Enlight_Exception
     * @throws Zend_Date_Exception
     */
    protected function addCronJob(Zend_Date $date)
    {
        /** @var Enlight_Components_Cron_Manager $manager */
        $manager = $this->container->get('cron');
        $job = $this->createCronJob($date);

        $insertedJob = $manager->getJobByAction('Shopware_CronJob_VirtuaShopwareAnonymization');
        if ($insertedJob) {
            $job->setId($insertedJob->getId());
            $manager->updateJob($job);
            return;
        }

        $manager->addJob($job);
    }
}
