<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge;

class Iterator
{
    /** @var int number of rows in entity */
    protected $totalSize;

    /** @var array of chunked data from db */
    protected $collection;

    /**
     * @var string[]
     */
    protected $data;

    /**
     * @var int Iteration counter
     */
    protected $iteration;

    /**
     * @var int Iteration counter offset for chunking
     */
    protected $iterationOffset = 0;

    /**
     * Iterator constructor.
     * @param array $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array $data
     */
    public function setRawData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->data;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->totalSize = $size;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->totalSize;
    }

    /**
     * @param $callable
     */
    public function walk($callable)
    {
        $self = $this; // PHP 5.3
        array_walk(
            $this->collection,
            function ($arg) use ($callable, $self) {
                $self->setRawData($arg);
                $callable($self);
                $self->iteration++;
            }
        );
    }

    /**
     * @param int $offset
     */
    public function setIterationOffset($offset)
    {
        $this->iterationOffset = $offset;
    }

    /**
     * @param $iteration int
     */
    public function setIteration($iteration)
    {
        $this->iteration = $iteration;
    }

    /**
     * @return int
     */
    public function getIteration()
    {
        return $this->iterationOffset + $this->iteration;
    }
}
