<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class UserShippingaddress extends AbstractAddress
{
    public function __construct($identifier)
    {
        parent::__construct($identifier);
        unset($this->formattersByAttribute['phone']);
    }

    /** {@inheritdoc} */
    protected $tableName = 's_user_shippingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'User Shippingaddress';
}
