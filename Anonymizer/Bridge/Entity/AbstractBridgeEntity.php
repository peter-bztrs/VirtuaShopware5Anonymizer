<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

use Doctrine\DBAL\Connection;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\AnonymizableValue;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Iterator;

abstract class AbstractBridgeEntity
{
    /** @var int rows to be fetch by one query */
    const ROWS_PER_QUERY = 50000;

    /** @var string, needs to be set in descendants */
    protected $tableName;

    /** @var string[], needs to be set in descendants */
    protected $formattersByAttribute = [];

    /** @var string[], needs to be set in descendants */
    protected $uniqueAttributes = [];

    /** @var string, name of entity as translatable string, needs to be set in descendants */
    protected $entityName;

    /** @var string to seed fake data generator */
    protected $identifier;

    /** @var Connection */
    protected $connection;

    /** @var array */
    protected $data = [];

    /** @var AnonymizableValue[]*/
    protected $values = [];

    /** @var int currentPage of collection for chunking */
    protected $currentPage = 0;

    /** @var string */
    protected $alias = 'ent';

    /**
     * AbstractBridgeEntity constructor.
     * @param $identifier string
     */
    public function __construct($identifier, Connection $connection)
    {
        $this->identifier = $identifier;
        $this->connection = $connection;
    }

    /**
     * Used after in update function
     */
    public function clearInstance()
    {
        $this->data = [];
        $this->values = [];
    }

    /**
     * Get AnonymizableValues
     * @return AnonymizableValue[]|null
     */
    public function getValues()
    {
            $this->values = [];
            foreach ($this->formattersByAttribute as $attribute => $formatter) {
                $this->values[$attribute] = new AnonymizableValue(
                    $formatter,
                    $this->data[$attribute],
                    in_array($attribute, $this->uniqueAttributes)
                );
            }

        return $this->values;
    }

    /**
     * Update anonymizable values
     */
    public function updateValues()
    {
        $values = array_map(function (AnonymizableValue $value) {
            return $value->getValue();
        },
            $this->values);
        $this->connection->update(
            $this->tableName,
            $values,
            ['id' => $this->data['id']]
        );
    }

    /**
     * Make iterator for chunked data
     * @return Iterator|null
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCollectionIterator()
    {
        $collection = $this->getDataChunk();
        $iterationOffset = $this->currentPage * self::ROWS_PER_QUERY;
        $size = $this->getEntitySize();
        if ($size <= $iterationOffset) {
            return null;
        }
        $this->currentPage++;

        $iterator = new Iterator($collection);
        $iterator->setSize($size);
        $iterator->setIterationOffset($iterationOffset);

        return $iterator;
    }

    /**
     * Check if provided entity class exists
     * @return bool
     */
    public function tableExists()
    {
        return (bool) $this->connection
            ->getSchemaManager()->tablesExist([$this->tableName]);
    }

    /**
     * @param $data
     */
    public function setRawData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return string[]
     */
    public function getFormattersByAttribute()
    {
        return $this->formattersByAttribute;
    }

    /**
     * @return string[]
     */
    public function getUniqueAttributes()
    {
        return $this->uniqueAttributes;
    }

    /**
     * @return array
     */
    protected function getDataChunk()
    {
        $data = $this->connection->createQueryBuilder()
            ->select($this->createSelectArray($this->alias))
            ->from($this->tableName, $this->alias)
            ->setMaxResults(self::ROWS_PER_QUERY)
            ->setFirstResult(self::ROWS_PER_QUERY * $this->currentPage)
            ->execute()
            ->fetchAll();

        return $data ? $data : [];
    }

    /**
     * @return int
     */
    protected function getEntitySize()
    {
        return (int) $this->connection->createQueryBuilder()
            ->select('count(' . $this->alias . '.id)')
            ->from($this->tableName, $this->alias)
            ->execute()
            ->fetchColumn();
    }

    /**
     * @param $alias
     * @return string[]
     */
    protected function createSelectArray($alias)
    {
        $attributes = array_keys($this->formattersByAttribute);
        array_walk($attributes, function (&$attribute) use ($alias) {
            $attribute = $alias . '.' . $attribute;
        });
        array_unshift($attributes, $alias . '.id');

        return $attributes;
    }
}
