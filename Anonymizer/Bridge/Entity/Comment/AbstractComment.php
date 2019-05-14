<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

abstract class AbstractComment extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'name'  => 'name',
        'email'      => 'safeEmail',
    );
}
