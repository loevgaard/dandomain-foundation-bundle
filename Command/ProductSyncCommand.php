<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSyncCommand extends ContainerAwareCommand
{
    use LockableTrait;

    protected function configure()
    {
        $this
            ->setName('dandomain-foundation:product-sync')
            ->setDescription('Runs Product synchronization')
            ->addOption('changed', null, InputOption::VALUE_NONE, 'If set, the command will sync products that have been changed in the given period of time')
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

        $changed = $input->getOption('changed');
        $start = $input->getOption('start');
        $end = $input->getOption('end');

        $service = $this->getContainer()->get('loevgaard_dandomain_foundation.product_service');
        $service->setOutput($output)->productSync($changed, $start, $end);

        $this->release();

        return 0;
    }
}
