<?php

namespace ShopwareAnonymizer\Test;

use Doctrine\DBAL\Connection;
use ShopwareAnonymizer\Anonymizer\Anonymizer;
use Shopware\Components\Test\Plugin\TestCase;

//todo make tests, this is only first approach
class AnonymizerTest extends TestCase
{
    /** @var Connection */
    private $connection;

    public function setUp()
    {
        parent::setUp();
//        $this->connection = Shopware()->Container()->get('dbal_connection');
//        $this->connection->beginTransaction();
//
//        $this->connection->update(
//            's_user',
//            ['email' => 'dafuk@example.net'],
//            ['id' => 4]
//        );
    }

    public function tearDown()
    {
//        parent::tearDown();
//        $this->connection->rollBack();
    }

    public function testCanCreateAnonymizer()
    {
        $anonymizer = new Anonymizer();
//        $result = $this->connection->createQueryBuilder()
//            ->select('u.email')
//            ->from('s_user', 'u')
//            ->where('id = 4')
//            ->execute()
//            ->fetchAll();
//
//        $this->assertFalse($result);
    }
}
