<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge;

class AnonymizableValue
{
    /**
     * @var string
     */
    private $formatter;
    /**
     * @var string
     */
    private $value;
    /**
     * @var bool
     */
    private $unique;

    /**
     * AnonymizableValue constructor.
     * @param $formatter
     * @param $value
     * @param bool $unique
     */
    public function __construct($formatter, $value, $unique = false)
    {
        $this->formatter = $formatter;
        $this->value = $value;
        $this->unique = (bool) $unique;
    }

    /**
     * @return string
     */
    public function getFakerFormatter()
    {
        return $this->formatter;
    }

    /**
     * @return bool
     */
    public function isUnique()
    {
        return $this->unique;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
