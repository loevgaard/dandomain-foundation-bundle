<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeSitesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:sites')
            ->setDescription('Synchronize sites from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $service = $this->getContainer()->get('loevgaard_dandomain_foundation.site_service');
        $service
            ->setOutput($output)
            ->syncAll();

        $this->release();

        return 0;
    }
}
