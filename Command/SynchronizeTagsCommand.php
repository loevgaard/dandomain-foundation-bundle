<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\TagSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeTagsCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var TagSynchronizerInterface
     */
    protected $tagSynchronizer;

    public function __construct(TagSynchronizerInterface $tagSynchronizer)
    {
        $this->tagSynchronizer = $tagSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:tags')
            ->setDescription('Synchronize tags from Dandomain to local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->tagSynchronizer->setLogger(new ConsoleLogger($output));

        $this->tagSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
