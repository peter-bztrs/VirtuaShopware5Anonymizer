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
            chdir(dirname(__DIR__) . '/../../');
            shell_exec(
                <<<EOT
echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig
curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig 
php composer-setup.php --filename=composer.phar
php -r "unlink('composer-setup.php');"
php -r "unlink('composer-setup.php.sig');"
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
