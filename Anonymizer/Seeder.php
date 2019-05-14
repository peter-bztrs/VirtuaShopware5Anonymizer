<?php

namespace VirtuaShopwareAnonymizer\Anonymizer;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\OrderBillingaddress;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\OrderShippingaddress;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\UserAddresses;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\UserBillingaddress;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Address\UserShippingaddress;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CampaignsLogs;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CampaignsMailaddresses;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CampaignsMaildata;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CmsSupport;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment\ArticlesVote;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\Comment\BlogComments;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CoreAuth;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CoreLog;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CorePaymentData;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CorePaymentInstance;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\CustomerSearchIndex;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\EmarketingPartner;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\User;

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
    protected $entitiesBySeed = [
        'userSeed' => [
            User::class,
            UserAddresses::class,
            UserBillingAddress::class,
            UserShippingAddress::class,
            ArticlesVote::class,
            BlogComments::class,
            CustomerSearchIndex::class,

            CampaignsLogs::class,
            CampaignsMailaddresses::class,
            CampaignsMaildata::class,

            OrderBillingaddress::class,
            OrderShippingaddress::class,
        ],
        'cms' => [
            CmsSupport::class,
        ],
        'coreAuth' => [
            CoreAuth::class,
            CoreLog::class,
            CorePaymentData::class,
            CorePaymentInstance::class,
        ],
        'emarketing' => [
            EmarketingPartner::class
        ]
    ];

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
