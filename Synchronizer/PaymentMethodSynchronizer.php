<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundationBundle\Entity\RepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\PaymentMethodUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentMethodSynchronizer extends Synchronizer implements PaymentMethodSynchronizerInterface
{
    /**
     * @var PaymentMethodUpdater
     */
    protected $paymentMethodUpdater;

    public function __construct(RepositoryInterface $repository, Api $api, string $logsDir, PaymentMethodUpdater $stateUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->paymentMethodUpdater = $stateUpdater;
    }

    public function syncOne(array $options = []) : OrderInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    public function syncAll(array $options = [])
    {
        throw new \RuntimeException('Method not implemented');

        // @todo fix site repository
        $siteIds = [26];
        $currency = 'DKK';

        foreach ($siteIds as $siteId) {
            $shippingMethods = \GuzzleHttp\json_decode((string)$this->api->settings->getShippingMethods($siteId)->getBody());

            foreach ($shippingMethods as $shippingMethod) {
                $entity = $this->paymentMethodUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($shippingMethod), $currency);
                $this->repository->save($entity);
            }
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
