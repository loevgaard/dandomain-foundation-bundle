<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductTypeSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeProductTypesCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var ProductTypeSynchronizerInterface
     */
    protected $productTypeSynchronizer;

    public function __construct(ProductTypeSynchronizerInterface $productTypeSynchronizer)
    {
        $this->productTypeSynchronizer = $productTypeSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:product-types')
            ->setDescription('Synchronize product types from Dandomain to local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->productTypeSynchronizer->setLogger(new ConsoleLogger($output));

        $this->productTypeSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
