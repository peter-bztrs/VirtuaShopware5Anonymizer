<?php

namespace VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address;

class OrderShippingaddress extends AbstractAddress
{
    /** {@inheritdoc} */
    protected $tableName = 's_order_shippingaddress';

    /** {@inheritdoc} */
    protected $entityName = 'Order Shippingaddress';
}
