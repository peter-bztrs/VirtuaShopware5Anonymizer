<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CoreAuth extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'name'  => 'name',
        'email' => 'safeEmail',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_core_auth';

    /** {@inheritdoc} */
    protected $entityName = 'Core Auth';
}
