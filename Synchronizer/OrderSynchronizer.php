<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\OptimisticLockException;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Repository\OrderRepository;
use Loevgaard\DandomainFoundationBundle\Updater\OrderUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderSynchronizer extends Synchronizer implements OrderSynchronizerInterface
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    /**
     * @var OrderUpdater
     */
    protected $orderUpdater;

    public function __construct(OrderRepository $repository, Api $api, string $logsDir, OrderUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->orderUpdater = $stateUpdater;
    }

    /**
     * @param array $options
     * @return OrderInterface|null
     * @throws OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function syncOne(array $options = []): ?OrderInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);

        $this->logger->debug('Syncing order '.$options['externalId']);

        $order = \GuzzleHttp\json_decode((string) $this->api->order->getOrder($options['externalId'])->getBody());

        $entity = $this->orderUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($order));
        $this->repository->save($entity);

        return $entity;
    }

    /**
     * @param array $options
     * @throws OptimisticLockException
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     */
    public function syncAll(array $options = [])
    {
        // @todo what happens if the sync stops at page 50/125? Could we implement something that resumed the sync?

        $options = $this->resolveOptions($options, [$this, 'configureOptionsAll']);

        $start = $options['start'];
        $end = $options['end'];

        $lastLog = $this->readLog();
        $log = ['options' => $options];

        $now = new DateTimeImmutable();

        if (!$start) {
            if (array_key_exists('end', $lastLog) and ($lastLog['end'] instanceof \DateTimeInterface)) {
                $start = $lastLog['end'];
            } else {
                $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
            }
        }

        if (!$end) {
            $end = $now;
        }

        // verification of dates
        if ($end > $now) {
            $end = $now;
        }

        if ($start > $end) {
            throw new \InvalidArgumentException('Start date is after end date');
        }

        $this->logger->info($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'));

        $modifiedOrderCount = $this->api->order->countByModifiedInterval($start, $end);
        $pages = ceil($modifiedOrderCount / $options['pageSize']);

        $this->logger->info('Modified orders: '.$modifiedOrderCount.' | Page size: '.$options['pageSize'].' | Page count: '.$pages);

        for ($page = 1; $page <= $pages; ++$page) {
            $this->logger->info($page.' / '.$pages);
            $this->outputMemoryUsage();

            $orders = \GuzzleHttp\json_decode((string) $this->api->order->getOrdersInModifiedInterval($start, $end, $page, $options['pageSize'])->getBody());

            foreach ($orders as $order) {
                $this->logger->info('Order: '.$order->id);
                $entity = $this->orderUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($order));
                $this->repository->save($entity);
            }

            $this->repository->clearAll();
        }

        $log['start'] = $start;
        $log['end'] = $end;

        $this->writeLog($log);
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['externalId'])
            ->setAllowedTypes('externalId', 'int')
            ->setRequired('externalId')
        ;
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'start' => null,
                'end' => null,
                'pageSize' => 100,
            ])
            ->setAllowedTypes('start', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('end', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('pageSize', 'int')
        ;
    }
}
