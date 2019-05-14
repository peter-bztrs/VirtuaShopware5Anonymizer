<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace VirtuaShopwareAnonymizer\Anonymizer;

use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\AbstractBridgeEntity;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Iterator;
use VirtuaShopwareAnonymizer\Anonymizer\Bridge\AnonymizableValue;

class Anonymizer
{
    /**
     * @var Seeder
     */
    protected $seeder;

    /** @var Provider */
    protected $provider;

    /** @var int */
    private $progressSteps = 1;

    /** @var null|resource */
    private $outputStream = null;

    /** @var bool */
    private $showProgress = true;

    /** @var AbstractBridgeEntity */
    private $entityModel;

    /**
     * Anonymizer constructor.
     * @param Seeder $seeder
     * @param Provider $provider
     */
    public function __construct(Seeder $seeder, Provider $provider)
    {
        //todo dodac do providera konfiguracje z pluginu
        $this->seeder = $seeder;
        $this->provider = $provider;
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
                foreach ($entityClassnames as $className) {
                    /** @var AbstractBridgeEntity $bridgeEntity */
                    $bridgeEntity = new $className($seed);
                    if ($bridgeEntity->tableExists()) {
                        while ($collectionIterator = $bridgeEntity->getCollectionIterator()) {
                            $this->update($collectionIterator, $bridgeEntity);
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
     * @param AbstractBridgeEntity[] $inputData
     */
    public function anonymize(array $inputData)
    {
        foreach ($inputData as $entity) {
            foreach ($entity->getValues() as $value) {
                $value->setValue(
                    $this->provider->getFakerData(
                        $value->getFakerFormatter(),
                        $this->getFieldIdentifier($entity, $value),
                        $value->isUnique()
                    )
                );
            }
        }
    }

    /**
     * @param resource $stream stream resource used for output (for example opened file pointer or STDOUT)
     */
    public function setOutputStream($stream)
    {
        $this->outputStream = $stream;
    }

    /**
     * @param $steps int How often progress output should be refreshed
     * (default is 1 = after every entity update; example: 10 = every 10 entity updates)
     */
    public function setProgressSteps($steps)
    {
        $this->progressSteps = $steps;
    }

    /**
     * Returns identifier for a field, based on entity and current value. This is used to map real data to fake
     * data in the same way for each unique entity identifier (i.e. customer id)
     *
     * @param Iterator $iterator
     * @param AbstractBridgeEntity $entityModel
     */
    public function update(Iterator $iterator, AbstractBridgeEntity $entityModel)
    {
        $this->entityModel = $entityModel;
        $this->outputStart();
        $iterator->walk([$this, 'updateCurrentRow']);
        $this->provider->resetUniqueGenerator();
        $this->outputDone();
        $this->entityModel = null;
    }

    /**
     * @param Iterator $iterator
     */
    public function updateCurrentRow(Iterator $iterator)
    {
        $this->entityModel->setRawData($iterator->getRawData());
        $this->anonymize([$this->entityModel]);
        $this->entityModel->updateValues();
        $this->entityModel->clearInstance();
        $this->outputIteratorStatus($iterator);
    }

    /**
     * @param AbstractBridgeEntity $entity
     * @param AnonymizableValue $value
     * @return string
     */
    private function getFieldIdentifier(AbstractBridgeEntity $entity, AnonymizableValue $value)
    {
        return sprintf('%s|%s', $entity->getIdentifier(), join('', (array)$value->getValue()));
    }

    /**
     * Print start message
     */
    private function outputStart()
    {
        if (is_resource($this->outputStream) && get_resource_type($this->outputStream) === 'stream') {
            fwrite($this->outputStream, sprintf("Updater started at %s.\n", date('H:i:s')));
        }
    }

    /**
     * @param Iterator $iterator
     */
    private function outputIteratorStatus(Iterator $iterator)
    {
        if ($this->showProgress && (($iterator->getIteration() + 1) % $this->progressSteps === 0)
            && is_resource($this->outputStream) && get_resource_type($this->outputStream) === 'stream'
        ) {
            fwrite(
                $this->outputStream,
                sprintf(
                    "\rUpdating %s: %s/%s - Memory usage %s Bytes",
                    $this->entityModel->getEntityName(),
                    str_pad(
                        $iterator->getIteration() + 1,
                        strlen($iterator->getSize()),
                        ' '
                    ),
                    $iterator->getSize(),
                    number_format(memory_get_usage())
                )
            );
        }
    }

    /**
     * Print output message
     */
    private function outputDone()
    {
        if (is_resource($this->outputStream) && get_resource_type($this->outputStream) === 'stream') {
            fwrite($this->outputStream, sprintf("\nUpdater finished at %s.\n\n", date('H:i:s')));
        }
    }
}
