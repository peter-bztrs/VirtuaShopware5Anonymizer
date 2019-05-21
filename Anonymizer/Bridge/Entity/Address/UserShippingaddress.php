<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

use Doctrine\DBAL\Connection;

class UserShippingaddress extends AbstractAddress
{
    public function __construct($identifier, Connection $connection)
    {
        parent::__construct($identifier, $connection);
        unset($this->formattersByAttribute['phone']);
    }

    /** {@inheritdoc} */
    protected $tableName = 's_user_shippingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'User Shippingaddress';
}
