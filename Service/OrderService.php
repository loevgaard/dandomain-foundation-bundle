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
        $now = new DateTimeImmutable();

        if ($start) {
            $start = DateTimeImmutable::createFromFormat('Y-m-d', $start);
            if($start === false) {
                throw new \InvalidArgumentException('$start has the wrong format');
            }
            $start = $start->setTime(0, 0, 0);
        } elseif (($settings) and array_key_exists('end', $settings)) {
            $start = $settings['end'];
        } else {
            $start = DateTimeImmutable::createFromFormat('Y-m-d', '2000-01-01')->setTime(0, 0, 0);
        }

        if ($end) {
            $end = DateTimeImmutable::createFromFormat('Y-m-d', $end);
            if($end === false) {
                throw new \InvalidArgumentException('$end has the wrong format');
            }

            $end = $end->setTime(23, 59, 59);
        } else {
            $end = $now;
        }

        // verification of dates
        if($end > $now) {
            $end = $now;
        }

        if($start > $end) {
            throw new \InvalidArgumentException('Start date is after end date');
        }

        $output->writeln($start->format('Y-m-d H:i:s').' - '.$end->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

        $steps = new \DatePeriod($start, $stepInterval, $end);
        foreach ($steps as $startStep) {
            /** @var \DateTimeImmutable $startStep */
            $endStep = $startStep->add($stepInterval);
            if($endStep > $end) {
                $endStep = $end;
            }

            $output->writeln($startStep->format('Y-m-d H:i:s').' - '.$endStep->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

            $orders = GuzzleHttp\json_decode((string)$this->api->order->getOrdersInModifiedInterval($startStep, $endStep)->getBody());

            foreach ($orders as $order) {
                $output->writeln('Order: '.$order->id, OutputInterface::VERBOSITY_VERBOSE);
                $this->orderSynchronizer->syncOrder($order, true);
            }

            file_put_contents($this->settingsFile, serialize([
                'start' => $startStep,
                'end' => $endStep
            ]));
        }
    }
}
