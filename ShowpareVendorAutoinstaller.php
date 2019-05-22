<?php

namespace VirtuaShopwareAnonymizer;
/**
 * Debuging
 * delete all dont work
 * when use from this object
 *
 */
class ShowpareVendorAutoinstaller
{
    public static function createVendorIfNotExists()
    {
        $composerPharDir = dirname(dirname(dirname(__DIR__)));
        $extractedComposerDir = __DIR__ . '/tmp';
        if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
            if (!file_exists($extractedComposerDir . '/vendor/autoload.php')) {
                $composerPhar = new \Phar($composerPharDir . '/composer.phar');
                $composerPhar->extractTo($extractedComposerDir);
            }
            require_once $extractedComposerDir. '/vendor/autoload.php';

            //run composer install in current dir
            putenv('COMPOSER_HOME=' . $extractedComposerDir . '/bin/composer');
            chdir(__DIR__);
            $stream = fopen('php://temp', 'w+');
            $output = new \Symfony\Component\Console\Output\StreamOutput($stream);
            $application = new \Composer\Console\Application();
            $application->setAutoExit(false);
            error_log('przed run' ."\n\n\n", 3, __DIR__ . '/log');
            $application->run(new \Symfony\Component\Console\Input\ArrayInput(array('command' => 'install')), $output);
            error_log('przed stream close' ."\n\n\n", 3, __DIR__ . '/log');
            fclose($stream);
            error_log('wykonal' ."\n\n\n", 3, __DIR__ . '/log');


            self::deleteAll($extractedComposerDir);
        }
    }

    public static function deleteVendorIfExists()
    {
        $vendorPath = __DIR__ . '/vendor';
        if (file_exists(__DIR__ . '/vendor')) {
            self::deleteAll($vendorPath);
        }
    }

    public static function deleteAll($path)
    {
        if (is_file($path)) {
            return unlink($path);
        } elseif (is_dir($path)) {
            $scan = glob(rtrim($path, '/') . '/*');
            foreach ($scan as $path) {
                error_log('path : ' . var_export($path , true)."\n\n\n", 3, __DIR__ . '/log');
                self::deleteAll($path);
            }
            $s = @rmdir($path);
            error_log('@rmdir : ' . var_export($s , true)."\n\n\n", 3, __DIR__ . '/log');
            return $s;
        }
    }
}
