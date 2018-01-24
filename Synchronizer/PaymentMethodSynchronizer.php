<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\OrderInterface;
use Loevgaard\DandomainFoundation\Repository\PaymentMethodRepository;
use Loevgaard\DandomainFoundation\Repository\SiteRepository;
use Loevgaard\DandomainFoundationBundle\Updater\PaymentMethodUpdater;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentMethodSynchronizer extends Synchronizer implements PaymentMethodSynchronizerInterface
{
    /**
     * @var PaymentMethodRepository
     */
    protected $repository;

    /**
     * @var PaymentMethodUpdater
     */
    protected $paymentMethodUpdater;

    /**
     * @var SiteRepository
     */
    protected $siteRepository;

    public function __construct(PaymentMethodRepository $repository, Api $api, string $logsDir, PaymentMethodUpdater $stateUpdater, SiteRepository $siteRepository)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->paymentMethodUpdater = $stateUpdater;
        $this->siteRepository = $siteRepository;
    }

    public function syncOne(array $options = []): OrderInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @param array $options
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncAll(array $options = [])
    {
        $sites = $this->siteRepository->findAll();

        foreach ($sites as $site) {
            $paymentMethods = \GuzzleHttp\json_decode((string) $this->api->settings->getPaymentMethods($site->getExternalId())->getBody());

            foreach ($paymentMethods as $paymentMethod) {
                $entity = $this->paymentMethodUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($paymentMethod), $site->getCurrency()->getIsoCodeAlpha());
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
