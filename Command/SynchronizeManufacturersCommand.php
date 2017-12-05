<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\ManufacturerSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeManufacturersCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var ManufacturerSynchronizerInterface
     */
    protected $manufacturerSynchronizer;

    public function __construct(ManufacturerSynchronizerInterface $periodSynchronizer)
    {
        $this->manufacturerSynchronizer = $periodSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:manufacturers')
            ->setDescription('Synchronize manufacturers/brands from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->manufacturerSynchronizer->setLogger(new ConsoleLogger($output));

        $this->manufacturerSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
