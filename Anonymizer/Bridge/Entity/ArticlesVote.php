<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Anonymizer\Bridge\Entity;

use ShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

class ArticlesVote extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'name'  => 'name',
        'email'      => 'safeEmail',
    );

    /** {@inheritdoc} */
    protected $tableName = 's_articles_vote';

    /** {@inheritdoc} */
    protected $entityName = 'Articles Vote';
}
