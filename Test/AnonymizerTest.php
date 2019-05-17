<?php

namespace VirtuaShopwareAnonymizer\Test;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use VirtuaShopwareAnonymizer\Anonymizer\Anonymizer;
use Shopware\Components\Test\Plugin\TestCase;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\AbstractBridgeEntity;
use VirtuaShopwareAnonymizer\Anonymizer\Provider;
use VirtuaShopwareAnonymizer\Anonymizer\Seeder;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Iterator;

class AnonymizerTest extends TestCase
{
    /** @var bool  */
    protected $anonymizeAllError = false;

    /** @var Connection */
    private $connection;

    /** @var Anonymizer */
    private $anonymizer;

    /** @var Seeder */
    private $seeder;


    /** @var string  */
    private $dataDir = __DIR__ . '/beforeAnonymization';

    /** @var string */
    private $fakeDbPath = __DIR__ . '/fakeDb.sql';

    /**
     * {@inheritdoc}
     * @throws \Doctrine\DBAL\DBALException
     */
    public function setUp()
    {
        parent::setUp();
        $this->connection = $this->makeConnection();
        $this->seeder = new Seeder();
        $this->anonymizer = $this->makeAnonymizer($this->seeder, $this->connection);

        mkdir($this->dataDir);

        $this->connection->beginTransaction();
        $this->prepareDb();
    }

    /**
     * Test if data has changed after
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function testAnonymizeAll()
    {
        $this->loopThroughEntities([$this, 'persistData']);
        $this->anonymizer->anonymizeAll();
        $this->loopThroughEntities([$this, 'hasDataChanged']);

        $this->assertFalse($this->anonymizeAllError);
    }

    /**
     * {@inheritdoc}
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function tearDown()
    {
        parent::tearDown();
        $this->connection->rollBack();
        $this->deletePersistedData();
    }

    /**
     * Prints message if data has not been changed
     * sets error flag if so
     * @param AbstractBridgeEntity $bridgeEntity
     */
    protected function hasDataChanged(AbstractBridgeEntity $bridgeEntity)
    {
        $data = $this->getPersistedData($bridgeEntity);
        $result = $this->fetchAllForEntity($bridgeEntity);
        array_walk($result, function (&$result) {
            $result = array_values($result);
            $result = array_map('strval', $result);
            $result = array_map([$this, 'deleteNewLine'], $result);
        });

        if ($data === $result) {
            $this->notChangedMessage($bridgeEntity);
            $this->anonymizeAllError = true;
        }
    }

    /**
     * @return Connection
     * @throws \Doctrine\DBAL\DBALException
     */
    private function makeConnection()
    {
        $connParams = [
            "password" => "root",
            "dbname" => "shopware",
            "host" => "shopware-database1",
            "charset" => "utf8mb4",
            "port" => "3306",
            "driver" => "pdo_mysql",
            "user" => "root"
        ];
        $config = new Configuration();
        return DriverManager::getConnection($connParams, $config);
    }

    /**
     * Prepare db fake data
     * @throws \Doctrine\DBAL\DBALException
     */
    private function prepareDb()
    {
        $sql = file_get_contents($this->fakeDbPath);
        $this->connection->executeQuery($sql);
    }

    /**
     * @param Seeder $seeder
     * @param Connection $connection
     * @return Anonymizer
     */
    private function makeAnonymizer(Seeder $seeder, Connection $connection)
    {
        $provider = new Provider();
        return new Anonymizer($seeder, $provider, $connection);
    }

    /**
     * @param AbstractBridgeEntity $entity
     * @param $alias
     * @return array
     */
    private function createSelectArray(AbstractBridgeEntity $entity, $alias)
    {
        $attributes = array_keys($entity->getFormattersByAttribute());
        array_walk($attributes, function (&$attribute) use ($alias) {
            $attribute = $alias . '.' . $attribute;
        });
        array_unshift($attributes, $alias . '.id');

        return $attributes;
    }

    /**
     * Use callback on every AbstractBridgeEntity
     * @param $callback
     */
    protected function loopThroughEntities($callback)
    {
        foreach ($this->seeder->getEntitiesBySeed() as $seed => $classNames) {
            foreach ($classNames as $className) {
                /** @var AbstractBridgeEntity $entity */
                $bridgeEntity = new $className($seed, $this->connection);
                $callback($bridgeEntity);
            }
        }
    }

    /**
     * Create tmp csv files
     * @param $bridgeEntity
     */
    protected function persistData($bridgeEntity)
    {
        $file = $this->dataDir . '/' . $bridgeEntity->getTableName();
        while ($collectionIterator = $bridgeEntity->getCollectionIterator()) {
            $collectionIterator->walk(
                function (Iterator $iterator) use ($file) {
                    $data = $this->deleteNewline(
                        join(', ', $iterator->getRawData())
                    );
                    file_put_contents($file, $data . "\n", FILE_APPEND);
                }
            );
        }
    }

    /**
     * @param AbstractBridgeEntity $bridgeEntity
     * @param $line
     * @return mixed
     */
    private function fetchAllForEntity(AbstractBridgeEntity $bridgeEntity)
    {
        $result = $this->connection->createQueryBuilder()
            ->select($this->createSelectArray($bridgeEntity, 'alias'))
            ->from($bridgeEntity->getTableName(), 'alias')
            ->execute()
            ->fetchAll();
        return $result;
    }

    /**
     * @param AbstractBridgeEntity $bridgeEntity
     * @return array
     */
    private function getPersistedData(AbstractBridgeEntity $bridgeEntity)
    {
        $path = $this->dataDir . '/' . $bridgeEntity->getTableName();
        $csvFile = file($path);
        $data = [];
        foreach ($csvFile as $line) {
            $datum = str_getcsv($line);
            array_walk($datum, function (&$item) {
                $item = strval($item);
                $item = trim($item);
                $item = $this->deleteNewline($item);
            });
            $data[] = $datum;
        }
        return $data;
    }


    /**
     * @param $string
     * @return string|string[]|null
     */
    private function deleteNewline($string)
    {
        return preg_replace("/[\r\n]+/", '', $string);
    }

    /**
     * Delete temporary csv files
     */
    private function deletePersistedData()
    {
        foreach (glob($this->dataDir . '/*') as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($this->dataDir);
    }

    /**
     * @param AbstractBridgeEntity $bridgeEntity
     */
    protected function notChangedMessage(AbstractBridgeEntity $bridgeEntity)
    {
        printf(
            "\n" . 'Data remained unanonymized in %s' . "\n",
            $bridgeEntity->getTableName()
        );
    }
}
