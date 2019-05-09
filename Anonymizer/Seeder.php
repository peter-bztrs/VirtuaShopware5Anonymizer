<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-05-09
 * Time: 11:41
 */

namespace ShopwareAnonymizer\Anonymizer;

use ShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\UserAddress;
use ShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\BillingAddress;
use ShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\ShippingAddress;
use ShopwareAnonymizer\Anonymizer\Bridge\Entity\User;

/**
 * Class Seeder
 * Containing index of entites, grouped by seed, which is used for anonymiziation
 */
class Seeder
{
    /**
     * AbstractBridgeEntity[] by seed used to seed anonymizer
     * @var array[]
     */
    protected $entitiesBySeed = array(
        'userSeed' => array(
            User::class,
            UserAddress::class,
            BillingAddress::class,
            ShippingAddress::class,
        )
    );

    /**
     * @return array[]
     */
    public function getEntitiesBySeed()
    {
        return $this->entitiesBySeed;
    }

    /**
     * @param array $entitiesBySeed
     */
    public function setEntitiesBySeed(array $entitiesBySeed)
    {
        $this->entitiesBySeed = $entitiesBySeed;
    }
}
