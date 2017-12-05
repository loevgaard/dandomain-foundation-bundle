<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundationBundle\Synchronizer\CategorySynchronizerInterface;
use Loevgaard\DandomainFoundationBundle\Synchronizer\OrderSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeCategoriesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var CategorySynchronizerInterface
     */
    protected $categorySynchronizer;

    public function __construct(CategorySynchronizerInterface $periodSynchronizer)
    {
        $this->categorySynchronizer = $periodSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:categories')
            ->setDescription('Synchronize categories from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->categorySynchronizer->setLogger(new ConsoleLogger($output));

        $this->categorySynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
