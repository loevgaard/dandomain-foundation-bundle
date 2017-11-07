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

        $optionStart = $input->getOption('start');
        $optionEnd = $input->getOption('end');
        $order = $input->getOption('order');
        $start = $end = null;

        if($optionStart) {
            $start = \DateTimeImmutable::createFromFormat('Y-m-d', $optionStart);
            if($start === false) {
                throw new \InvalidArgumentException('Option --start has the wrong format');
            }
            $start = $start->setTime(0, 0, 0);
        }

        if($optionEnd) {
            $end = \DateTimeImmutable::createFromFormat('Y-m-d', $optionEnd);
            if($end === false) {
                throw new \InvalidArgumentException('Option --end has the wrong format');
            }
            $end = $end->setTime(23, 59, 59);
        }

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
