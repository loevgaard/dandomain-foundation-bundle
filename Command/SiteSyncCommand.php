<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SiteSyncCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('dandomain-foundation:site-sync')
            ->setDescription('Runs Site synchronization')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('dandomain_foundation.site_service')->siteSync();
    }
}
