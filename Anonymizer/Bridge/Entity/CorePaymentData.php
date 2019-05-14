<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CorePaymentData extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'bankname'  => 'name',
        'bic' => 'swiftBicNumber',
        'iban' => 'iban',
        'account_number' => 'bankAccountNumber',
        'bank_code' => 'randomNumber',
        'account_holder' => 'name',
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_core_payment_data';

    /** {@inheritdoc} */
    protected $entityName = 'Core Payment Data';
}
