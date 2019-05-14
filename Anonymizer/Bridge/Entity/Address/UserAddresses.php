<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class UserAddresses extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_user_addresses';

    /** {@inheritdoc} */
    protected $entityName = 'User Addresses';
}
