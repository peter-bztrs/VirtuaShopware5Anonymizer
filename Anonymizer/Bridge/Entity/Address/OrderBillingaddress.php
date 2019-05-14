<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class OrderBillingaddress extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_order_billingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'Order Billingaddress';
}
