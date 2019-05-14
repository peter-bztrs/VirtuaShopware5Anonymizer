<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CorePaymentInstance extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'address' => 'address',
        'zipcode'   => 'postcode',
        'city'   => 'city',
        'account_number' => 'bankAccountNumber',
        'account_holder' => 'name',
        'bank_name'  => 'name',
        'bank_code' => 'randomNumber',
        'bic' => 'swiftBicNumber',
        'iban' => 'iban',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_core_payment_instance';

    /** {@inheritdoc} */
    protected $entityName = 'Core Payment Instance';
}
