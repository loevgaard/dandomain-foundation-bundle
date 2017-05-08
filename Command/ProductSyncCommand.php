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
            ->addOption('end', null, InputOption::VALUE_OPTIONAL, 'Products end date')
            ->addOption('start', null, InputOption::VALUE_OPTIONAL, 'Products start date')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $changed = $input->getOption('changed');
        $end = $input->getOption('end');
        $start = $input->getOption('start');

        $service = $this->getContainer()->get('loevgaard_dandomain_foundation.product_service');
        $service->setOutput($output)->productSync($changed, $end, $start);

        $this->release();

        return 0;
    }
}
