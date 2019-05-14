<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class OrderBillingaddress extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_order_billingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'Order Billingaddress';
}
