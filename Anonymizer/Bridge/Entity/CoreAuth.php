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

class CoreAuth extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'name'  => 'name',
        'email' => 'safeEmail',
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
        'email'
    );

    /** {@inheritdoc} */
    protected $tableName = 's_core_auth';

    /** {@inheritdoc} */
    protected $entityName = 'Core Auth';
}
