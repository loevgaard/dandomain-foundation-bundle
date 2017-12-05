<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundationBundle\Synchronizer\OrderSynchronizerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeOrdersCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var OrderSynchronizerInterface
     */
    protected $orderSynchronizer;

    public function __construct(OrderSynchronizerInterface $stateSynchronizer)
    {
        $this->orderSynchronizer = $stateSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:orders')
            ->setDescription('Synchronize orders from Dandomain til local database')
            ->addOption('start', null, InputOption::VALUE_REQUIRED, 'Start date in the format `Y-m-d`')
            ->addOption('end', null, InputOption::VALUE_REQUIRED, 'End date in the format `Y-m-d`')
            ->addOption('order', 'o', InputOption::VALUE_REQUIRED, 'If set, this is the only order that will be synced')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $optionStart = $input->getOption('start');
        $optionEnd = $input->getOption('end');
        $optionOrder = $input->getOption('order');
        $start = $end = null;

        if ($optionStart) {
            $start = DateTimeImmutable::createFromFormat('Y-m-d', $optionStart);
            if ($start === false) {
                throw new \InvalidArgumentException('Option --start has the wrong format');
            }
            $start = $start->setTime(0, 0, 0);
        }

        if ($optionEnd) {
            $end = DateTimeImmutable::createFromFormat('Y-m-d', $optionEnd);
            if ($end === false) {
                throw new \InvalidArgumentException('Option --end has the wrong format');
            }
            $end = $end->setTime(23, 59, 59);
        }

        $this->orderSynchronizer->setLogger(new ConsoleLogger($output));

        if($optionOrder) {
            $this->orderSynchronizer->syncOne([
                'externalId' => (int)$optionOrder
            ]);
        } else {
            $this->orderSynchronizer->syncAll([
                'start' => $start,
                'end' => $end
            ]);
        }

        $this->release();

        return 0;
    }
}
