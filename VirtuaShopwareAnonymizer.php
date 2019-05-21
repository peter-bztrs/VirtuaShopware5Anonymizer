<?php

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
            'Shopware_Console_Add_Command' => 'registerVendor',
            'Enlight_Bootstrap_AfterInitResource_hooks' => 'composerAutoInstall'
        ];
    }

    public function composerAutoInstall()
    {
        $shopwareRoot = dirname(dirname(dirname(__DIR__)));
        $extractedComposer = __DIR__ . '/tmp';

        if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
            $this->extractComposer($extractedComposer, $shopwareRoot);
            require_once $extractedComposer . '/vendor/autoload.php';

            $this->composerInstall($extractedComposer);

            $this->deleteAll($extractedComposer);
            $this->deleteAll(__DIR__ . '/vendor/composer');
        }
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function registerVendor()
    {
        if (file_exists($this->getPath() . '/vendor/autoload.php')) {
            require_once $this->getPath() . '/vendor/autoload.php';
        }
    }

    /**
     * @param $extractedComposer
     * @param $shopwareRoot
     */
    protected function extractComposer($extractedComposer, $shopwareRoot)
    {
        if (!file_exists($extractedComposer . '/vendor/autoload.php')) {
            $composerPhar = new \Phar($shopwareRoot . '/composer.phar');
            $composerPhar->extractTo($extractedComposer);
        }
    }

    /**
     * @param $extractedComposer
     */
    protected function composerInstall($extractedComposer)
    {
        putenv('COMPOSER_HOME=' . $extractedComposer . '/bin/composer');
        chdir(__DIR__);
        $stream = fopen('php://temp', 'w+');
        $output = new \Symfony\Component\Console\Output\StreamOutput($stream);
        $application = new \Composer\Console\Application();
        $application->setAutoExit(false);
        $application->run(
            new \Symfony\Component\Console\Input\ArrayInput(
                array('command' => 'install')
            ),
            $output
        );
        fclose($stream);
    }

    protected function deleteAll($str)
    {
        if (is_file($str)) {
            return unlink($str);
        } elseif (is_dir($str)) {
            $scan = glob(rtrim($str, '/') . '/*');
            foreach ($scan as $path) {
                deleteAll($path);
            }
            return @rmdir($str);
        }
    }
}
