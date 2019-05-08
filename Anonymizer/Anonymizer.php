<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-04-30
 * Time: 14:22
 */

namespace ShopwareAnonymizer\Anonymizer;


use ShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;
use ShopwareAnonymizer\Anonymizer\Bridge\Entity\Customer;
use ShopwareAnonymizer\IntegerNet\Anonymizer\Implementor\AnonymizableEntity;
use ShopwareAnonymizer\IntegerNet\Anonymizer\Updater;

class Anonymizer
{
    protected $entitiesBySeed = [
        'userSeed' => [
            Customer::class,
        ]
    ];

    /** @var Updater */
    protected $_updater;

    public function __construct()
    {
        $anonymizer = new \ShopwareAnonymizer\IntegerNet\Anonymizer\Anonymizer();
        $this->_updater = new Updater($anonymizer);
    }

//  todo make unit tests
    public function anonymizeAll(){
        $connection = Shopware()->Models()->getConnection();
        $connection->beginTransaction();
        try {
            foreach ($this->entitiesBySeed as $seed => $entityClassnames) {
                foreach ($entityClassnames as $className) {
                    /** @var AbstractBridgeEntity $bridgeEntity */
                    $bridgeEntity = new $className($seed);
                    if ($bridgeEntity->entityExists()) {
                        while ($collectionIterator = $bridgeEntity->getCollectionIterator()) {
                            $this->_updater->update($collectionIterator, $bridgeEntity);
                        }
                    }
                }
            }
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollBack();
            throw $e;
        }
    }

    /**
     * @param resource $stream stream resource used for output (for example opened file pointer or STDOUT)
     */
    public function setOutputStream($stream)
    {
        $this->_updater->setOutputStream($stream);
    }

    /**
     * @param boolean $showProgress True if progress should be output (default is true)
     */
    public function setShowProgress($showProgress)
    {
        $this->_updater->setShowProgress($showProgress);
    }

    /**
     * @param $steps int How often progress output should be refreshed (default is 1 = after every entity update; example: 10 = every 10 entity updates)
     */
    public function setProgressSteps($steps)
    {
        $this->_updater->setProgressSteps($steps);
    }
}