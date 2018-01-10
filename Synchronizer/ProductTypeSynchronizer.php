<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\ProductTypeInterface;
use Loevgaard\DandomainFoundationBundle\Repository\ProductTypeRepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductTypeSynchronizer extends Synchronizer implements ProductTypeSynchronizerInterface
{
    /**
     * @var ProductTypeUpdaterInterface
     */
    protected $productTypeUpdater;

    public function __construct(ProductTypeRepositoryInterface $repository, Api $api, string $logsDir, ProductTypeUpdaterInterface $productTypeUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->productTypeUpdater = $productTypeUpdater;
    }

    public function syncOne(array $options = []): ?DandomainFoundation\Entity\Generated\ProductTypeInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    public function syncAll(array $options = [])
    {
        $states = \GuzzleHttp\json_decode((string) $this->api->order->getOrderStates()->getBody());

        foreach ($states as $state) {
            $entity = $this->productTypeUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($state));
            $this->repository->save($entity);
        }
    }

    public function configureOptionsOne(OptionsResolver $resolver)
    {
    }

    public function configureOptionsAll(OptionsResolver $resolver)
    {
    }
}
