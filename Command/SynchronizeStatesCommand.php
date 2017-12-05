<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\StateSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeStatesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var StateSynchronizerInterface
     */
    protected $stateSynchronizer;

    public function __construct(StateSynchronizerInterface $stateSynchronizer)
    {
        $this->stateSynchronizer = $stateSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:states')
            ->setDescription('Synchronize states from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->stateSynchronizer->setLogger(new ConsoleLogger($output));

        $this->stateSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
