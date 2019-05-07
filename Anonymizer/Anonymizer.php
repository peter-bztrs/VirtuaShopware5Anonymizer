<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-04-30
 * Time: 14:22
 */

namespace ShopwareAnonymizer\Anonymizer;


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

//  todo test
    public function anonymizeAll(){
        $connection = Shopware()->Models()->getConnection();
        $connection->beginTransaction();
        try {
            foreach ($this->entitiesBySeed as $seed => $entityClassnames) {
                foreach ($entityClassnames as $className) {
                    if (class_exists($className)) {
                        $entityModel = new $className($seed);
                        while ($collectionIterator = $entityModel->getCollectionIterator()) {
                            $this->_updater->update($collectionIterator, $entityModel);
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
     * @return AnonymizableEntity[]
     */
    private function getEntityModels()
    {
        $models = [];
        foreach ($this->entitiesBySeed as $seed => $entityClassnames) {
            foreach ($entityClassnames as $className) {
                if (class_exists($className)) {
                    $models[] = new $className($seed);
                }
            }
        }

        return $models;
    }
}