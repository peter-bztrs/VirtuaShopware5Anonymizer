<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CampaignsMailaddresses extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email' => 'safeEmail',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_campaigns_mailaddresses';

    /** {@inheritdoc} */
    protected $entityName = 'Campaigns Mailaddresses';
}
