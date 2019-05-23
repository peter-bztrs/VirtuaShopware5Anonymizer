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
     * when installing from plugin
     */
    public function build(ContainerBuilder $container)
    {
        require __DIR__ . '/autoComposerInstall.php';
        parent::build($container);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Console_Add_Command' => "registerVendor",
            'Enlight_Controller_Action_PreDispatch' => 'onPostDispatchBackendIndex',
            'Shopware_CronJob_VirtuaShopwareAnonymization' => 'onVirtuaShopwareAnonymization',
            'Shopware_CronJob_Finished_Shopware_CronJob_VirtuaShopwareAnonymization' => 'onAnonymizationFinish',
        ];
    }

    /**
     * When installing form command line
     * @param \Enlight_Event_EventArgs $args
     */
    public function registerVendor()
    {
        require __DIR__ . '/autoComposerInstall.php';
        if (file_exists($this->getPath() . '/vendor/autoload.php')) {
            require_once $this->getPath() . '/vendor/autoload.php';
        }
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
}
