<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundationBundle\Synchronizer\ProductSynchronizer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SynchronizeProductsCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var ProductSynchronizer
     */
    protected $productSynchronizer;

    public function __construct(ProductSynchronizer $stateSynchronizer)
    {
        $this->productSynchronizer = $stateSynchronizer;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:sync:products')
            ->setDescription('Synchronize products from Dandomain til local database')
            ->addOption('changed', null, InputOption::VALUE_NONE, 'If set, the command will sync products that have been changed in the given period of time')
            ->addOption('start', null, InputOption::VALUE_REQUIRED, 'Start date in the format `Y-m-d`')
            ->addOption('end', null, InputOption::VALUE_REQUIRED, 'End date in the format `Y-m-d`')
            ->addOption('number', null, InputOption::VALUE_REQUIRED, 'If number is set, the command will only sync the product with this number')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $optionChanged = $input->getOption('changed') ? true : false;
        $optionStart = $input->getOption('start');
        $optionEnd = $input->getOption('end');
        $optionNumber = $input->getOption('number');
        $start = $end = null;

        $this->productSynchronizer->setLogger(new ConsoleLogger($output));

        if ($optionNumber) {
            $this->productSynchronizer->syncOne([
                'number' => $optionNumber,
            ]);
        } else {
            if ($optionStart) {
                $start = \DateTimeImmutable::createFromFormat('Y-m-d', $optionStart);
                if (false === $start) {
                    throw new \InvalidArgumentException('Option --start has the wrong format');
                }
                $start = $start->setTime(0, 0, 0);
            }

            if ($optionEnd) {
                $end = \DateTimeImmutable::createFromFormat('Y-m-d', $optionEnd);
                if (false === $end) {
                    throw new \InvalidArgumentException('Option --end has the wrong format');
                }
                $end = $end->setTime(23, 59, 59);
            }

            $this->productSynchronizer->syncAll([
                'changed' => $optionChanged,
                'start' => $start,
                'end' => $end,
            ]);
        }

        $this->release();

        return 0;
    }
}
