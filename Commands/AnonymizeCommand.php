<?php

namespace ShopwareAnonymizer\Commands;


use Shopware\Commands\ShopwareCommand;
use ShopwareAnonymizer\Anonymizer\Anonymizer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnonymizeCommand extends ShopwareCommand
{
    protected function configure()
    {
        $this
            ->setName('shopwareAnonymizer:anonymize')
            ->setDescription('Anonymize user data in database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Anonymizer $anonymizer */
        $anonymizer = $this->container->get('shopware_anonymizer.anonymizer.anonymizer');
        $anonymizer->setOutputStream($output);
        $anonymizer->anonymizeAll();
    }
}