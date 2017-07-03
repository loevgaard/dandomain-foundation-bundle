<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use Loevgaard\DandomainFoundationBundle\DateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundationBundle\Synchronizer\OrderSynchronizer;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\Kernel;

class OrderService extends Service
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @var Kernel
     */
    protected $kernel;

    /**
     * @var OrderSynchronizer
     */
    protected $orderSynchronizer;

    /**
     * @var string
     */
    protected $settingsFile;

    /**
     * Constructor.
     *
     * @param Api               $api
     * @param OrderSynchronizer $orderSynchronizer
     * @param Kernel            $kernel
     */
    public function __construct(Api $api, OrderSynchronizer $orderSynchronizer, Kernel $kernel)
    {
        $this->api = $api;
        $this->kernel = $kernel;
        $this->orderSynchronizer = $orderSynchronizer;
        $this->settingsFile = $kernel->getLogDir().'/dandomain-foundation-order-sync.log';
    }

    /**
     * Synchronizes orders
     *
     * @param string $end Format must be Y-m-d
     * @param string $start Format must be Y-m-d
     */
    public function orderSync($start = null, $end = null)
    {
        $output = $this->getOutput();
        $settings = unserialize(@file_get_contents($this->settingsFile));
        $stepInterval = new \DateInterval('PT15M');

        if (null !== $start) {
            $start = DateTimeImmutable::createFromFormat('Y-m-d', $start)->setTime(0, 0, 0);
        } elseif (($settings) and array_key_exists('end', $settings)) {
            $start = $settings['end'];
        } else {
            $start = DateTimeImmutable::createFromFormat('Y-m-d', '2000-01-01')->setTime(0, 0, 0);
        }

        $output->writeln('Date from: '.$start->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

        /** @var DateTimeImmutable $startStep */
        $startStep = clone $start;

        if (null !== $end) {
            $end = DateTimeImmutable::createFromFormat('Y-m-d', $end);
            $output->writeln('Date to: '.$end->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);
        }

        /** @var DateTimeImmutable $endStep */
        $endStep = $startStep->add($stepInterval);

        do {
            $output->writeln($startStep->format('Y-m-d H:i:s').' - '.$endStep->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

            $now = new DateTimeImmutable();
            if ($startStep > $now) {
                $output->writeln('Start time is higher than current time, so we stop syncing', OutputInterface::VERBOSITY_VERBOSE);
                break;
            }
            if (($end instanceof \DateTimeInterface) and ($end < $endStep)) {
                $output->writeln('End step is higher than the specified end date, so we stop syncing', OutputInterface::VERBOSITY_VERBOSE);
                break;
            }

            $orders = GuzzleHttp\json_decode((string)$this->api->order->getOrdersInModifiedInterval($startStep, $endStep)->getBody());

            foreach ($orders as $order) {
                $output->writeln('Order: '.$order->id, OutputInterface::VERBOSITY_VERBOSE);
                $this->orderSynchronizer->syncOrder($order, true);
            }

            file_put_contents($this->settingsFile, serialize(['end' => $endStep, 'start' => $startStep]));
            $startStep = $endStep->add(new \DateInterval('PT1S'));
            $endStep = $startStep->add($stepInterval);
        } while (true);
    }
}
