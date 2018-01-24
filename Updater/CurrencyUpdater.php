<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Currency;
use Loevgaard\DandomainFoundation\Entity\Generated\CurrencyInterface;
use Loevgaard\DandomainFoundation\Repository\CurrencyRepository;

class CurrencyUpdater implements CurrencyUpdaterInterface
{
    /**
     * @var CurrencyRepository
     */
    protected $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function updateFromApiResponse(array $data): CurrencyInterface
    {
        $entity = $this->currencyRepository->findOneByExternalId($data['id']);
        if (!$entity) {
            $entity = new Currency();
            $entity->setExternalId($data['id']);
        }

        $entity
            ->setCode($data['code'])
            ->setDeActivated($data['deActivated'])
            ->setFactor($data['factor'])
            ->setIcon($data['icon'])
            ->setDefault($data['isDefault'])
            ->setPayCode($data['payCode'])
            ->setRoundCondition($data['roundCondition'])
            ->setRoundDirection($data['roundDirection'])
            ->setRoundParam($data['roundParam'])
            ->setRoundPrices($data['roundPrices'])
            ->setSymbol($data['symbol'])
            ->setSymbolAlign($data['symbolAlign'])
            ->setText($data['text'])
        ;

        return $entity;
    }
}
