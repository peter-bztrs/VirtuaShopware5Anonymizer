<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

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
