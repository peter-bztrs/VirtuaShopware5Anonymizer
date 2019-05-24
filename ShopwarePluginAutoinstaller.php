<?php

namespace VirtuaShopwareAnonymizer;

/**
 * Class ShopwarePluginAutoinstaller
 */
class ShopwarePluginAutoinstaller
{
    /**
     * Ensure composer.phar in shopware root and use it to install
     * plugin vendor
     */
    public static function install()
    {
        $shopwareComposer = dirname(__DIR__) . '/../../composer.phar';
        $localVendorAutoload = __DIR__ . '/vendor/autoload.php';

        self::installDependenciesIfDontExists($shopwareComposer, $localVendorAutoload);

        if (file_exists($localVendorAutoload)) {
            require_once $localVendorAutoload;
        }
    }

    /**
     * @param $shopwareComposer
     * @param $localVendorAutoload
     */
    public static function installDependenciesIfDontExists($shopwareComposer, $localVendorAutoload)
    {
        if (!file_exists($localVendorAutoload)) {
            self::installComposerIfNotExists($shopwareComposer);
            if (file_exists($shopwareComposer)) {
                self::installLocalVendor($shopwareComposer);
            }
        }
    }

    /**
     * @param $shopwareComposer
     */
    protected static function installComposerIfNotExists($shopwareComposer)
    {
        if (!file_exists($shopwareComposer)) {
            chdir($shopwareComposer);
            shell_exec(
                <<<EOT
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
EOT
            );
        }
    }

    /**
     * @param $shopwareComposer
     */
    protected static function installLocalVendor($shopwareComposer)
    {
        putenv('COMPOSER_HOME=' . $shopwareComposer);
        chdir(__DIR__);
        shell_exec('php ' . $shopwareComposer . ' install');
    }
}
