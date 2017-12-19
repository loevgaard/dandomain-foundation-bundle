<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\VariantInterface;

class VariantSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Variant';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\VariantInterface';

    /**
     * Synchronizes Variant.
     *
     * @param \stdClass $variant
     * @param bool      $flush
     *
     * @return VariantInterface
     */
    public function syncVariant($variant, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $variant->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($variant->id ?: null)
            ->setSortOrder($variant->sortOrder ?: null)
            ->setText($variant->text ?: null)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush($entity);
        }

        return $entity;
    }
}
