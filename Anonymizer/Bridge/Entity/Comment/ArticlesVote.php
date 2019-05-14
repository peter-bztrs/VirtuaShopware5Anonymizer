<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

class ArticlesVote extends AbstractComment
{
    /** {@inheritdoc} */
    protected $tableName = 's_articles_vote';

    /** {@inheritdoc} */
    protected $entityName = 'Articles Vote';
}
