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
    protected $formattersByAttribute = array(
        'email'      => 'safeEmail',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'birthday'   => 'date'
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
        'email'
    );

    /** {@inheritdoc} */
    protected $tableName = 's_user';
}
