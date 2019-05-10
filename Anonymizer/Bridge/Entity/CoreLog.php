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

class CoreLog extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'user'  => 'name',
        'ip_address' => 'ipv4',
        'user_agent' => 'userAgent',
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
        'email'
    );

    /** {@inheritdoc} */
    protected $tableName = 's_core_log';

    /** {@inheritdoc} */
    protected $entityName = 'Core Log';
}
