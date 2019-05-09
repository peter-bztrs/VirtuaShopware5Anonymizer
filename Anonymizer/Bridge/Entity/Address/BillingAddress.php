<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class BillingAddress extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_user_billingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'Billing Address';
}
