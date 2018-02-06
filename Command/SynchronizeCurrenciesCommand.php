<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\CurrencySynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeCurrenciesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var CurrencySynchronizerInterface
     */
    protected $currencySynchronizer;

    public function __construct(CurrencySynchronizerInterface $currencySynchronizer)
    {
        $this->currencySynchronizer = $currencySynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:currencies')
            ->setDescription('Synchronize currencies from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->currencySynchronizer->setLogger(new ConsoleLogger($output));
        $this->currencySynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
