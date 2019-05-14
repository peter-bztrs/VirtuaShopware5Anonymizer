<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CustomerSearchIndex extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
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
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_customer_search_index';

    /** {@inheritdoc} */
    protected $entityName = 'CustomerSearchIndex';
}
