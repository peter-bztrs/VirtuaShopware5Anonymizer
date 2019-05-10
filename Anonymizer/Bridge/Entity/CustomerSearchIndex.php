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

class CustomerSearchIndex extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'email'      => 'safeEmail',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'title' => 'title',
        'birthday'   => 'date',
        'company'      => 'company',
        'street'   => 'streetAddress',
        'zipcode'   => 'postcode',
        'city'   => 'city',
        'phone'   => 'e164PhoneNumber',
        'additional_address_line1'   => 'address',
        'additional_address_line2'   => 'address',
        'country_name' => 'country',
        'age' => 'randomDigit',
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
        'email'
    );

    /** {@inheritdoc} */
    protected $tableName = 's_customer_search_index';

    /** {@inheritdoc} */
    protected $entityName = 'CustomerSearchIndex';
}
