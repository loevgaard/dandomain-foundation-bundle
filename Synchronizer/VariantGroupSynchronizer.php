<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\VariantGroupInterface;

class VariantGroupSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\VariantGroup';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\VariantGroupInterface';

    /**
     * @var VariantSynchronizer
     */
    protected $variantSynchronizer;

    /**
     * Set VariantSynchronizer.
     *
     * @param VariantSynchronizer $variantSynchronizer
     *
     * @return VariantGroupSynchronizer
     */
    public function setVariantSynchronizer(VariantSynchronizer $variantSynchronizer)
    {
        $this->variantSynchronizer = $variantSynchronizer;

        return $this;
    }

    /**
     * Synchronizes VariantGroup.
     *
     * @param array $variantGroup
     * @param bool  $flush
     *
     * @return VariantGroupInterface
     */
    public function syncVariantGroup($variantGroup, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $variantGroup->id,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $entity
            ->setExternalId($variantGroup->id)
            ->setSelectText($variantGroup->selectText)
            ->setSortOrder($variantGroup->sortOrder)
            ->setText($variantGroup->text)
        ;

        if (is_array($variantGroup->variants)) {
            foreach ($variantGroup->variants as $variantTmp) {
                $variant = $this->variantSynchronizer->syncVariant($variantTmp, $flush);
                $entity->addVariant($variant);
            }
        }

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
