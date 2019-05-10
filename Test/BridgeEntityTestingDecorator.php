<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-05-09
 * Time: 12:28
 */

namespace ShopwareAnonymizer\Test;

use ShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

class BridgeEntityTestingDecorator extends AbstractBridgeEntity
{
    /** @var int */
    protected $rowsPerQuery = 50000;

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

    /** @var string */
    protected $fixturePath;

    public function __construct(AbstractBridgeEntity $bridgeEntity, $fixturePath)
    {
        $this->entityClass = $bridgeEntity->getEntityClass();
        $this->entityName = $bridgeEntity->getEntityName();
        $this->identifier = $bridgeEntity->getIdentifier();
        $this->formattersByAttribute = $bridgeEntity->getFormattersByAttribute();
        $this->uniqueAttributes = $bridgeEntity->getUniqueAttributes();

        $this->fixturePath = $fixturePath;
    }

    /**
     * @param $rowsPerQuery
     */
    protected function setRowsPerQuery($rowsPerQuery)
    {
        $this->rowsPerQuery = $rowsPerQuery;
    }

    /**
     * @return array
     */
    protected function getDataChunk()
    {
        //todo get data from yaml fixture
    }

    /**
     * @return int
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    protected function getEntitySize()
    {
        //todo get size of entities in fixture
    }
}
