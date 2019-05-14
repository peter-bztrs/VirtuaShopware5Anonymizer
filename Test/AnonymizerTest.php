<?php

namespace VirtuaShopwareAnonymizer\Test;

use Doctrine\DBAL\Connection;
use VirtuaShopwareAnonymizer\Anonymizer\Anonymizer;
use Shopware\Components\Test\Plugin\TestCase;
use VirtuaShopwareAnonymizer\Test\Fixtures\AbstractFixture;
use VirtuaShopwareAnonymizer\Test\Fixtures\UserFixture;


class AnonymizerTest extends TestCase
{
    /** @var Connection */
    private $connection;

    public function setUp()
    {
        parent::setUp();
        $this->connection = Shopware()->Container()->get('dbal_connection');
        $this->connection->beginTransaction();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->connection->rollBack();
    }

    // todo
    public function testAnonymizeAll()
    {
    }
}
