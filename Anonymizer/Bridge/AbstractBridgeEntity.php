<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge;

use Shopware\Components\Model\ModelManager;
use ShopwareAnonymizer\IntegerNet\Anonymizer\AnonymizableValue;
use ShopwareAnonymizer\IntegerNet\Anonymizer\Implementor\AnonymizableEntity;

abstract class AbstractBridgeEntity implements AnonymizableEntity
{
    const ROWS_PER_QUERY = 50000;

    /** @var string Entity::class, needs to be set in descendants */
    protected $entityClass;

    /** @var string[], needs to be set in descendants */
    protected $formattersByAttribute = array();

    /** @var string[], needs to be set in descendants */
    protected $uniqueAttributes = array();

    /** @var string, name of entity as translatable string, needs to be set in descendants */
    protected $entityName;

    /** @var string to seed fake data generator */
    protected $identifier;

    /** @var ModelManager */
    protected $modelManager;

    /** @var array */
    protected $data = array();

    /** @var AnonymizableValue[]|null */
    protected $values;

    /** @var int currentPage of collection for chunking */
    protected $currentPage = 0;

    /** @var string */
    protected $alias = 'ent';

    /**
     * AbstractBridgeEntity constructor.
     * @param $identifier string
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
        $this->modelManager = Shopware()->Models();
    }

    /**
     * {@inheritdoc}
     */
    public function clearInstance()
    {
        $this->data = array();
        $this->values = null;
    }

    /**
     * {@inheritdoc}
     */
    public function setRawData($data)
    {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getValues()
    {
        if ($this->values === null) {
            $this->values = [];
            foreach ($this->formattersByAttribute as $attribute => $formatter) {
                $this->values[$attribute] = new AnonymizableValue(
                    $formatter,
                    $this->data[$attribute],
                    in_array($attribute, $this->uniqueAttributes)
                );
            }
        }

        return $this->values;
    }

    /**
     * {@inheritdoc}
     */
    public function updateValues()
    {
        $values = array_map(function (AnonymizableValue $value) {
            return $value->getValue();
        },
        $this->values);
        $this->modelManager->getConnection()->update(
            $this->getTableName(),
            $values,
            ['id' => $this->data['id']]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
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
    public function entityExists()
    {
        return class_exists($this->entityClass);
    }

    /**
     * @return array
     */
    protected function getDataChunk()
    {
        $data = $this->modelManager->createQueryBuilder()->select($this->createSelectArray($this->alias))
            ->from($this->entityClass, $this->alias)
            ->setMaxResults(self::ROWS_PER_QUERY)
            ->setFirstResult(self::ROWS_PER_QUERY * $this->currentPage)
            ->getQuery()
            ->execute();

        return $data ? $data : [];
    }

    /**
     * @return int
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    protected function getEntitySize()
    {
        return (int) $this->modelManager->createQueryBuilder()
            ->select('count(' . $this->alias . '.id)')
            ->from($this->entityClass, $this->alias)
            ->getQuery()
            ->getSingleScalarResult();
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

    /**
     * @return string
     */
    protected function getTableName()
    {
        return $this->modelManager->getClassMetadata($this->entityClass)->getTableName();
    }
}
