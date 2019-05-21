<?php

namespace VirtuaShopwareAnonymizer\Commands;

use Shopware\Commands\ShopwareCommand;
use VirtuaShopwareAnonymizer\Anonymizer\Anonymizer;
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
            ->setName('VirtuaShopwareAnonymizer:anonymize')
            ->setDescription('Anonymize user data in database');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Anonymizer $anonymizer */
        $anonymizer = $this->container->get('virtua_shopware_anonymizer.anonymizer.anonymizer');

        $out = fopen('php://stdout', 'w');
        $anonymizer->setOutputStream($out);
        $anonymizer->anonymizeAll();
        fclose($out);
    }
}
