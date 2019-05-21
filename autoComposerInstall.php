<?php

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {

    $shopwareRoot = dirname(dirname(dirname(__DIR__)));
    $extractedComposer = $shopwareRoot . '/tmp';

    if (!file_exists($extractedComposer . '/vendor/autoload.php')) {
        $composerPhar = new \Phar($shopwareRoot . '/composer.phar');
        $composerPhar->extractTo($extractedComposer);
    }

    require_once $extractedComposer . '/vendor/autoload.php';
    putenv('COMPOSER_HOME=' . $extractedComposer . '/bin/composer');
    chdir(__DIR__);
    $stream = fopen('php://temp', 'w+');
    $output = new \Symfony\Component\Console\Output\StreamOutput($stream);
    $application = new \Composer\Console\Application();
    $application->setAutoExit(false);
    $code = $application->run(new \Symfony\Component\Console\Input\ArrayInput(array('command' => 'install')), $output);
    var_dump(stream_get_contents($stream));

    deleteAll($extractedComposer);
    deleteAll(__DIR__ . '/vendor/composer');
}

function deleteAll($str)
{
    //It it's a file.
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