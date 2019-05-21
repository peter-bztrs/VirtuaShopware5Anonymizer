<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

use Doctrine\DBAL\Connection;

class UserBillingaddress extends AbstractAddress
{
    public function __construct($identifier, Connection $connection)
    {
        parent::__construct($identifier, $connection);
        $this->formattersByAttribute['ustid'] = 'randomNumber';
    }

    /** {@inheritdoc} */
    protected $tableName = 's_user_billingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'User Billingaddress';
}
