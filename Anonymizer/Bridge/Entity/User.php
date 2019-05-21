<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class User extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email' => 'safeEmail',
        'firstname' => 'firstName',
        'lastname' => 'lastName',
        'birthday' => 'date',
        'salutation' => 'salutation',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_user';

    /** {@inheritdoc} */
    protected $entityName = 'User';
}
