<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\Common\Persistence\Mapping\MappingException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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

    public function __construct(OrderRepository $repository, Api $api, string $logsDir, OrderUpdater $orderUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->orderUpdater = $orderUpdater;
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
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws MappingException
     */
    public function syncAll(array $options = [])
    {
        // @todo what happens if the sync stops at page 50/125? Could we implement something that resumed the sync?

        $options = $this->resolveOptions($options, [$this, 'configureOptionsAll']);

        if($options['changed']) {
            $this->addToLogFileName('changed');
        }

        $start = $options['start'];
        $end = $options['end'];

        $log = $this->readLog();

        $now = new DateTimeImmutable();

        if (!$start) {
            if (array_key_exists('end', $log) and ($log['end'] instanceof \DateTimeImmutable)) {
                $start = $log['end'];
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

        $orders = $this->getOrders($start, $end, $options['pageSize'], $options['changed']);

        foreach ($orders as $order) {
            $this->logger->info('Order: '.$order->id);
            $entity = $this->orderUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($order));
            $this->repository->save($entity);
        }

        $this->writeLog([
            'start' => $start,
            'end' => $end,
            'options' => $options
        ]);
    }

    /**
     * @param \DateTimeImmutable $start
     * @param \DateTimeImmutable $end
     * @param int $pageSize
     * @param bool $changed
     * @return \Generator
     * @throws MappingException
     */
    protected function getOrders(\DateTimeImmutable $start, \DateTimeImmutable $end, int $pageSize, bool $changed) : \Generator
    {
        $this->logger->info($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'));

        if($changed) {
            $modifiedOrderCount = $this->api->order->countByModifiedInterval($start, $end);
            $pages = ceil($modifiedOrderCount / $pageSize);

            $this->logger->info('Modified orders: '.$modifiedOrderCount.' | Page size: '.$pageSize.' | Page count: '.$pages);

            for ($page = 1; $page <= $pages; ++$page) {
                $this->logger->info($page.' / '.$pages);
                $this->outputMemoryUsage();

                $orders = \GuzzleHttp\json_decode((string) $this->api->order->getOrdersInModifiedInterval($start, $end, $page, $pageSize)->getBody());

                foreach ($orders as $order) {
                    yield $order;
                }

                $this->repository->clearAll();
            }
        } else {
            $interval = new \DateInterval('PT60M');

            /** @var \DateTimeImmutable[]|\DatePeriod $period */
            $period = new \DatePeriod($start, $interval, $end);

            foreach($period as $dt) {
                $periodStart = $dt;
                $periodEnd = $dt->add($interval);
                if($periodEnd > $period->getEndDate()) {
                    $periodEnd = $period->getEndDate();
                }

                $this->logger->info($periodStart->format('Y-m-d H:i:s').' - '.$periodEnd->format('Y-m-d H:i:s'));

                $orders = \GuzzleHttp\json_decode((string) $this->api->order->getOrders($periodStart, $periodEnd)->getBody());

                foreach ($orders as $order) {
                    yield $order;
                }

                $this->repository->clearAll();
            }
        }
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
                'changed' => false,
                'pageSize' => 100,
            ])
            ->setAllowedTypes('start', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('end', ['null', \DateTimeImmutable::class])
            ->setAllowedTypes('changed', 'bool')
            ->setAllowedTypes('pageSize', 'int')
        ;
    }
}
