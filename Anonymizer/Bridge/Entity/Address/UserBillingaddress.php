<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class UserBillingaddress extends AbstractAddress
{
    public function __construct($identifier)
    {
        parent::__construct($identifier);
        $this->formattersByAttribute['ustid'] = 'randomNumber';
    }

    /** {@inheritdoc} */
    protected $tableName = 's_user_billingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'User Billingaddress';
}
