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
            ->addOption('start', null, InputOption::VALUE_OPTIONAL, 'Start date in the format `Y-m-d`')
            ->addOption('end', null, InputOption::VALUE_OPTIONAL, 'End date in the format `Y-m-d`')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $start = $input->getOption('start');
        $end = $input->getOption('end');

        $service = $this->getContainer()->get('loevgaard_dandomain_foundation.order_service');
        $service->setOutput($output)->orderSync($start, $end);

        $this->release();

        return 0;
    }
}
