<?php

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
