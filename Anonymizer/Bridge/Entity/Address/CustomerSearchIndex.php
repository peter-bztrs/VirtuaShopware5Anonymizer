<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class CustomerSearchIndex extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email'      => 'safeEmail',
        'title' => 'title',
        'birthday'   => 'date',
        'company'      => 'company',
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
