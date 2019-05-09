<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge\Entity;

use ShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

class Customer extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $entityClass = \Shopware\Models\Customer\Customer::class;

    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email'      => 'safeEmail',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'salutation' => 'title',
        'birthday'   => 'date'
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $entityName = 'Customer';
}
