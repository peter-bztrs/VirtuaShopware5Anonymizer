<?php

namespace ShopwareAnonymizer\Tests;

use ShopwareAnonymizer\Anonymizer\Anonymizer;
use Shopware\Components\Test\Plugin\TestCase;

class AnonymizerTest extends TestCase
{
    public function testCanCreateAnonymizer()
    {
        $anonymizer = new Anonymizer();
    }
}
