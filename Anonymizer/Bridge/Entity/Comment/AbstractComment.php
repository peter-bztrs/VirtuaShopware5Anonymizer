<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\AbstractBridgeEntity;

abstract class AbstractComment extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'name'  => 'name',
        'email' => 'safeEmail',
    ];
}
