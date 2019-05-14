<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\AbstractBridgeEntity;

abstract class AbstractAddress extends AbstractBridgeEntity
{
    /** {@inheritdoc} */
    protected $formattersByAttribute = [
        'company'      => 'company',
        'firstname'  => 'firstName',
        'lastname'   => 'lastName',
        'street'   => 'streetAddress',
        'zipcode'   => 'postcode',
        'city'   => 'city',
        'title' => 'title',
        'phone'   => 'e164PhoneNumber',
        'additional_address_line1'   => 'address',
        'additional_address_line2'   => 'address',
    ];
}
