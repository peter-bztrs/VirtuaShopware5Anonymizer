<?php
IteratorKułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment;

class BlogComments extends AbstractComment
{
    /** {@inheritdoc} */
    protected $tableName = 's_blog_comments';

    /** {@inheritdoc} */
    protected $entityName = 'Blog Comments';
}
