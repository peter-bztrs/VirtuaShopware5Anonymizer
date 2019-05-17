<?php

namespace VirtuaShopwareAnonymizer\Test;

use VirtuaShopwareAnonymizer\VirtuaShopwareAnonymizer as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['VirtuaShopwareAnonymizer'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
