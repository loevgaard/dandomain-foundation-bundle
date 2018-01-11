<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundation\Entity\QueueItem;
use Loevgaard\DandomainFoundationBundle\Repository\QueueRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessQueueCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var QueueRepositoryInterface
     */
    protected $queueRepository;

    public function __construct(QueueRepositoryInterface $queueRepository)
    {
        $this->queueRepository = $queueRepository;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:queue:process')
            ->setDescription('Processes the queue')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $producer = $this->getContainer()->get('enqueue.producer');


        // @todo iterate through all instead of limiting to 500
        $queueItems = $this->queueRepository->findBy([
            'status' => QueueItem::STATUS_PENDING
        ], [], 500);

        foreach ($queueItems as $queueItem) {
            $queueItem->setStatus(QueueItem::STATUS_PROCESSING);
            $producer->sendEvent($queueItem->getType(), $queueItem->getIdentifier());

            $this->queueRepository->save($queueItem);
        }

        return 0;
    }
}
