<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;

class CampaignsLogs extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = array(
        'email'      => 'safeEmail',
    );

    /** {@inheritdoc} */
    protected $uniqueAttributes = array(
        'email'
    );

    /** {@inheritdoc} */
    protected $tableName = 's_campaigns_logs';

    /** {@inheritdoc} */
    protected $entityName = 'Campaign Logs';
}
