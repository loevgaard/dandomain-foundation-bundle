<?php

namespace Loevgaard\DandomainFoundationBundle\Command;

use Loevgaard\DandomainFoundation\Entity\QueueItem;
use Loevgaard\DandomainFoundation\Repository\QueueItemRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessQueueCommand extends ContainerAwareCommand
{
    use LockableTrait;

    /**
     * @var QueueItemRepository
     */
    protected $queueItemRepository;

    public function __construct(QueueItemRepository $queueItemRepository)
    {
        $this->queueItemRepository = $queueItemRepository;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('loevgaard:dandomain-foundation:queue:process')
            ->setDescription('Processes the queue')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($this->lock())) {
            $output->writeln('The command is already running in another process.');

            return 0;
        }

        $producer = $this->getContainer()->get('enqueue.producer');

        // @todo iterate through all instead of limiting to 500
        $queueItems = $this->queueItemRepository->findBy([
            'status' => QueueItem::STATUS_PENDING,
        ], [], 500);

        foreach ($queueItems as $queueItem) {
            $queueItem->setStatus(QueueItem::STATUS_PROCESSING);
            $producer->sendEvent($queueItem->getType(), $queueItem->getIdentifier());

            $this->queueItemRepository->save($queueItem);
        }

        return 0;
    }
}
