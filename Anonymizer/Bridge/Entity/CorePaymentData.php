<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

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
