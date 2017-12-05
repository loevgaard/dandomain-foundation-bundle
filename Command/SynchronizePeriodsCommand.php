<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\PeriodSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizePeriodsCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var PeriodSynchronizerInterface
     */
    protected $periodSynchronizer;

    public function __construct(PeriodSynchronizerInterface $periodSynchronizer)
    {
        $this->periodSynchronizer = $periodSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:periods')
            ->setDescription('Synchronize periods from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->periodSynchronizer->setLogger(new ConsoleLogger($output));

        $this->periodSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
