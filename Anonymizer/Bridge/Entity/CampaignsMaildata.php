<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CampaignsMaildata extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email' => 'safeEmail',
        'firstname' => 'firstName',
        'lastname' => 'lastName',
        'street' => 'streetAddress',
        'zipcode' => 'postcode',
        'city' => 'city',
        'salutation' => 'salutation',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_campaigns_maildata';

    /** {@inheritdoc} */
    protected $entityName = 'Campaigns Maildata';
}
