<?php

namespace Loevgaard\DandomainFoundationBundle\Service;

use Dandomain\Api\Api;
use GuzzleHttp;
use function Loevgaard\DandomainFoundationBundle\getDateTime;
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
     * @param string $end
     * @param string $start
     */
    public function orderSync($end = null, $start = null)
    {
        $output = $this->getOutput();
        $settings = unserialize(@file_get_contents($this->settingsFile));
        $stepInterval = new \DateInterval('PT15M');

        if (null !== $start) {
            $start = getDateTime($start, true)->setTime(0, 0, 0);
        } elseif (($settings) and array_key_exists('end', $settings)) {
            $start = $settings['end'];
        } else {
            $start = getDateTime('2000-01-01', true)->setTime(0, 0, 0);
        }

        /** @var \DateTimeImmutable $startStep */
        $startStep = clone $start;

        if (null !== $end) {
            $end = new \DateTimeImmutable($end);
        }

        /** @var \DateTimeImmutable $endStep */
        $endStep = $startStep->add($stepInterval);

        do {
            $now = new \DateTimeImmutable('NOW');
            if ($startStep > $now) {
                break;
            }
            if (($end instanceof \DateTimeImmutable) and ($end < $endStep)) {
                break;
            }

            $output->writeln($startStep->format('Y-m-d H:i:s').' - '.$endStep->format('Y-m-d H:i:s'), OutputInterface::VERBOSITY_VERBOSE);

            $orders = GuzzleHttp\json_decode($this->api->order->getOrdersInModifiedInterval($startStep, $endStep)->getBody()->getContents());

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
