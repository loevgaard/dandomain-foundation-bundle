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

        $end = $input->getOption('end');
        $start = $input->getOption('start');

        $this->getContainer()->get('loevgaard_dandomain_foundation.product_service')->productSync($end, $start);

        $this->release();
    }
}
