<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\ShippingMethodSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeShippingMethodsCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var ShippingMethodSynchronizerInterface
     */
    protected $shippingMethodSynchronizer;

    public function __construct(ShippingMethodSynchronizerInterface $periodSynchronizer)
    {
        $this->shippingMethodSynchronizer = $periodSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:shipping-methods')
            ->setDescription('Synchronize shipping methods from Dandomain til local database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $this->shippingMethodSynchronizer->setLogger(new ConsoleLogger($output));

        $this->shippingMethodSynchronizer->syncAll();

        $this->release();

        return 0;
    }
}
