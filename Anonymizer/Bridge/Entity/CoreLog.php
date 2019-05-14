<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CoreLog extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'user'  => 'name',
        'ip_address' => 'ipv4',
        'user_agent' => 'userAgent',
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_core_log';

    /** {@inheritdoc} */
    protected $entityName = 'Core Log';
}
