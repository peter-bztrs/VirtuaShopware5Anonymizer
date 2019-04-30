<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-04-30
 * Time: 15:30
 */

namespace ShopwareAnonymizer\Bridge;


use Shopware\Components\Model\ModelEntity;
use ShopwareAnonymizer\IntegerNet\Anonymizer\Implementor\CollectionIterator;

class Iterator implements CollectionIterator
{
    /**
     * @var ModelEntity
     */
    protected $_repository;

    /**
     * @var string[]
     */
    protected $_data;
    /**
     * @var int Iteration counter
     */
    protected $_iteration;
    /**
     * @var int Iteration counter offset for chunking
     */
    protected $_iterationOffset = 0;

    function getRawData()
    {
        // TODO: Implement getRawData() method.
    }

    function getSize()
    {
        // TODO: Implement getSize() method.
    }

    function walk($callable)
    {
        // TODO: Implement walk() method.
    }

    function getIteration()
    {
        return $this->_iteration;
    }
}