<?php

namespace VirtuaShopwareAnonymizer;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Shopware-Plugin VirtuaShopwareAnonymizer.
 */
class VirtuaShopwareAnonymizer extends Plugin
{
    /**
     * Build with composer install
     */
    public function build(ContainerBuilder $container)
    {
        require_once __DIR__ . '/autoComposerInstall.php';
        parent::build($container);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'onPostDispatchBackendIndex',
            'Shopware_CronJob_VirtuaShopwareAnonymization' => 'onVirtuaShopwareAnonymization',
            'Shopware_CronJob_Finished_Shopware_CronJob_VirtuaShopwareAnonymization' => 'onAnonymizationFinish',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onVirtuaShopwareAnonymization(\Enlight_Event_EventArgs $args)
    {
        $anonymizer = Shopware()->Container()->get('virtua_shopware_anonymizer.anonymizer.anonymizer');
        $anonymizer->anonymizeAll();
    }

    /**
     * Delete anonymization cron job after it has finished
     * @param \Enlight_Event_EventArgs $args
     */
    public function onAnonymizationFinish(\Enlight_Event_EventArgs $args)
    {
        $job = $args->get('job');
        $manager = Shopware()->Container()->get('cron');
        $manager->deleteJob($job);
    }

    /**
     * Register backend template
     * @param \Enlight_Event_EventArgs $args
     */
    public function onPostDispatchBackendIndex(\Enlight_Event_EventArgs $args)
    {
        $args->getSubject()->View()
            ->addTemplateDir($this->getPath() . '/Resources/views/');
    }
}
