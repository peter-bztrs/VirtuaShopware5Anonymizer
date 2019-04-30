<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-04-30
 * Time: 14:22
 */

namespace ShopwareAnonymizer\Anonymizer;


use Shopware\Models\Customer\Customer;
use ShopwareAnonymizer\IntegerNet\Anonymizer\Updater;

class Anonymizer
{
    protected $entitiesToAnonymize = [
        Customer::class,
    ];

    /** @var Updater */
    protected $_updater;

    public function __construct()
    {
        $anonymizer = new \ShopwareAnonymizer\IntegerNet\Anonymizer\Anonymizer();
        $this->_updater = new Updater($anonymizer);
    }

}