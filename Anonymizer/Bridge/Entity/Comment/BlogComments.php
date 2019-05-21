<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

class BlogComments extends AbstractComment
{
    /** {@inheritdoc} */
    protected $tableName = 's_blog_comments';

    /** {@inheritdoc} */
    protected $entityName = 'Blog Comments';
}
