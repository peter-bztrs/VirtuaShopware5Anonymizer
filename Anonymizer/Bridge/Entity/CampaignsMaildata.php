<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class CampaignsMaildata extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'email'      => 'safeEmail',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'street'   => 'streetAddress',
        'zipcode'   => 'postcode',
        'city'   => 'city',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_campaigns_maildata';

    /** {@inheritdoc} */
    protected $entityName = 'Campaigns Maildata';
}
