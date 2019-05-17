<?php
/**
 * Created by PhpStorm.
 * User: virtua
 * Date: 2019-05-17
 * Time: 15:21
 */

namespace VirtuaShopwareAnonymizer\Test;


use VirtuaShopwareAnonymizer\Anonymizer\Bridge\Entity\AbstractBridgeEntity;

class TesterAnonymizerTest extends AnonymizerTest
{
    /**
     * Test if data has changed after
     * @throws \Doctrine\DBAL\ConnectionException
     */
    public function testAnonymizeAll()
    {
        $this->loopThroughEntities([$this, 'persistData']);
        $this->loopThroughEntities([$this, 'hasDataChanged']);

        $this->assertTrue($this->anonymizeAllError);
    }

    /**
     * Uploads method to don't print message
     * @param AbstractBridgeEntity $bridgeEntity
     */
    protected function notChangedMessage(AbstractBridgeEntity $bridgeEntity)
    {
    }
}
