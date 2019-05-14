<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\AbstractBridgeEntity;
use VirtuaShopwareAnonymizer\IntegerNet\Anonymizer\Updater;

class Anonymizer
{
    /**
     * @var Seeder
     */
    protected $seeder;

    /** @var Updater */
    protected $updater;

    /**
     * Anonymizer constructor.
     */
    public function __construct()
    {
        $anonymizer = new \VirtuaShopwareAnonymizer\IntegerNet\Anonymizer\Anonymizer();
        $this->updater = new Updater($anonymizer);
        $this->seeder = new Seeder();
    }

    /**
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function anonymizeAll()
    {
        $connection = Shopware()->Models()->getConnection();
        $connection->beginTransaction();
        try {
            foreach ($this->seeder->getEntitiesBySeed() as $seed => $entityClassnames) {
                //todo salt seed here, with random number?
                foreach ($entityClassnames as $className) {
                    /** @var AbstractBridgeEntity $bridgeEntity */
                    $bridgeEntity = new $className($seed);
                    if ($bridgeEntity->tableExists()) {
                        while ($collectionIterator = $bridgeEntity->getCollectionIterator()) {
                            $this->updater->update($collectionIterator, $bridgeEntity);
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
        $this->updater->setOutputStream($stream);
    }

    /**
     * @param boolean $showProgress True if progress should be output (default is true)
     */
    public function setShowProgress($showProgress)
    {
        $this->updater->setShowProgress($showProgress);
    }

    /**
     * @param $steps int How often progress output should be refreshed
     * (default is 1 = after every entity update; example: 10 = every 10 entity updates)
     */
    public function setProgressSteps($steps)
    {
        $this->updater->setProgressSteps($steps);
    }
}
