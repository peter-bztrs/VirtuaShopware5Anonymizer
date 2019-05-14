<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

class ArticlesVote extends AbstractComment
{
    /** {@inheritdoc} */
    protected $tableName = 's_articles_vote';

    /** {@inheritdoc} */
    protected $entityName = 'Articles Vote';
}
