<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\SiteSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeSitesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var SiteSynchronizerInterface
     */
    protected $siteSynchronizer;

    public function __construct(SiteSynchronizerInterface $categorySynchronizer)
    {
        $this->siteSynchronizer = $categorySynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:sites')
            ->setDescription('Synchronize sites from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->siteSynchronizer->setLogger(new ConsoleLogger($output));

        $this->siteSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
