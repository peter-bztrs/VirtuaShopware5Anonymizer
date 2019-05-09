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

class Address extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $entityClass = \Shopware\Models\Customer\Address::class;

    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'company'      => 'company',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'street'   => 'streetAddress',
        'zipcode'   => 'postcode',
        'city'   => 'city',
        'phone'   => 'e164PhoneNumber',
        'additional_address_line1'   => 'address',
        'additional_address_line2'   => 'address',
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
    );

    /** {@inheritdoc} */
    protected $tableName = 's_user_addresses';
}
