<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeOrdersCommand extends ContainerAwareCommand
{
    use LockableTrait;

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:orders')
            ->setDescription('Synchronize orders from Dandomain til local database')
            ->addOption('start', null, InputOption::VALUE_REQUIRED, 'Start date in the format `Y-m-d`')
            ->addOption('end', null, InputOption::VALUE_REQUIRED, 'End date in the format `Y-m-d`')
            ->addOption('order', 'o', InputOption::VALUE_REQUIRED, 'If set, this is the only order that will be synced')
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
        $order = $input->getOption('order');

        $service = $this->getContainer()->get('loevgaard_dandomain_foundation.order_service');
        $service->setOutput($output);

        if($order) {
            $service->syncOne([
                'order' => (int)$order
            ]);
        } else {
            $service->syncAll([
                'start' => $start,
                'end' => $end
            ]);
        }

        $this->release();

        return 0;
    }
}
