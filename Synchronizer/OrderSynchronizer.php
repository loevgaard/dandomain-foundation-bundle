<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\OrderUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Loevgaard\DandomainFoundationBundle\DateTime\DateTimeImmutable;

class OrderSynchronizer extends Synchronizer implements OrderSynchronizerInterface
{
    /**
     * @var OrderUpdater
     */
    protected $orderUpdater;

    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir, OrderUpdater $orderUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->orderUpdater = $orderUpdater;
    }

    public function syncOne(array $options = []) : OrderInterface
    {
        $options = $this->resolveOptions($options, [$this, 'configureOptionsOne']);
        $order = \GuzzleHttp\json_decode((string)$this->api->order->getOrder($options['externalId'])->getBody());
        $entity = $this->orderUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($order));
        $this->repository->save($entity);

        return $entity;
    }

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
            if (array_key_exists('end', $lastLog) and ($lastLog['end'] instanceof DateTimeImmutable)) {
                $start = $lastLog['end'];
            } else {
                $start = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2000-01-01 00:00:00');
            }
        }

        if(!$end) {
            $end = $now;
        }

        // verification of dates
        if($end > $now) {
            $end = $now;
        }

        if($start > $end) {
            throw new \InvalidArgumentException('Start date is after end date');
        }

        $this->logger->info($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'));

        $modifiedOrderCount = $this->api->order->countByModifiedInterval($start, $end);
        $pages = ceil($modifiedOrderCount / $options['pageSize']);

        $this->logger->info('Modified orders: '.$modifiedOrderCount.' | Page size: '.$options['pageSize'].' | Page count: '.$pages);

        for($page = 1; $page <= $pages; $page++) {
            $this->logger->info($page.' / '.$pages);

            $orders = \GuzzleHttp\json_decode((string)$this->api->order->getOrdersInModifiedInterval($start, $end, $page, $options['pageSize'])->getBody());

            foreach ($orders as $order) {
                $entity = $this->orderUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($order));
                $this->repository->save($entity);
            }
        }

        $log['start'] = $start;
        $log['end'] = $end;

        $this->writeLog($log);
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(['externalId'])
            ->setAllowedTypes('externalId', 'string')
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
