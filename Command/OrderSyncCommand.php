<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderSyncCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('dandomain-foundation:order-sync')
            ->setDescription('Runs Order synchronization')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('dandomain_foundation.order_service')->orderSync();
    }
}
