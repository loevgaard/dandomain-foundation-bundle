<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class OrderSyncCommand extends ContainerAwareCommand
{
    use LockableTrait;

    protected function configure()
    {
        $this
            ->setName('dandomain-foundation:order-sync')
            ->setDescription('Runs Order synchronization')
            ->addOption('end', null, InputOption::VALUE_OPTIONAL, 'Orders end date')
            ->addOption('start', null, InputOption::VALUE_OPTIONAL, 'Orders start date')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $end = $input->getOption('end');
        $start = $input->getOption('start');

        $this->getContainer()->get('dandomain_foundation.order_service')->orderSync($end, $start);

        $this->release();
    }
}