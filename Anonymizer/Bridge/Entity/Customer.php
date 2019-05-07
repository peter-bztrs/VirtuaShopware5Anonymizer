<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-05-07
 * Time: 08:47
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge\Entity;


use ShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

class Customer extends AbstractBridgeEntity
{
    protected $entityClass = \Shopware\Models\Customer\Customer::class;

    protected $formattersByAttribute = [
        'email'      => 'safeEmail',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'salutation' => 'title',
        'birthday'   => 'date'
    ];

    protected $uniqueAttributes = [
        'email'
    ];
}