<?php

namespace ShopwareAnonymizer\Tests;

use ShopwareAnonymizer\ShopwareAnonymizer as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'ShopwareAnonymizer' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['ShopwareAnonymizer'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
