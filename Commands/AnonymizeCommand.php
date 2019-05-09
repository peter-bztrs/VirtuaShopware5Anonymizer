<?php
/**
 * User: Jakub Kułaga
 * Date: 2019-05-09
 * Time: 09:41
 *
 * @author  Kuba Kułaga <jkulaga@wearevirtua.com>
 */

namespace ShopwareAnonymizer\Commands;

use Shopware\Commands\ShopwareCommand;
use ShopwareAnonymizer\Anonymizer\Anonymizer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnonymizeCommand extends ShopwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('shopwareAnonymizer:anonymize')
            ->setDescription('Anonymize user data in database');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Anonymizer $anonymizer */
        $anonymizer = $this->container->get('shopware_anonymizer.anonymizer.anonymizer');

        $out = fopen('php://stdout', 'w');
        $anonymizer->setOutputStream($out);
        $anonymizer->anonymizeAll();
        fclose($out);
    }
}
