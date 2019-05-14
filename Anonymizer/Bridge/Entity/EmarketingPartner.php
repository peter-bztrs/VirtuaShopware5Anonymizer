<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity;

class EmarketingPartner extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'company'      => 'company',
        'contact' => 'word',
        'street'   => 'streetAddress',
        'zipcode'   => 'postcode',
        'city'   => 'city',
        'phone'   => 'e164PhoneNumber',
        'fax' => 'e164PhoneNumber',
        'country' => 'country',
        'email'      => 'safeEmail',
        'web' => 'url',
        'profil' => 'paragraph',
    ];

    /** {@inheritdoc} */
    protected $uniqueAttributes = [
        'email'
    ];

    /** {@inheritdoc} */
    protected $tableName = 's_emarketing_partner';

    /** {@inheritdoc} */
    protected $entityName = 'Emarketing Partner';
}
