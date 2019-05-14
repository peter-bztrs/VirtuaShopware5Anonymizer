<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class UserAddresses extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_user_addresses';

    /** {@inheritdoc} */
    protected $entityName = 'User Addresses';
}
