<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CmsSupport extends AbstractBridgeEntity
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
    protected $tableName = 's_cms_support';

    /** {@inheritdoc} */
    protected $entityName = 'Cms Support';
}
