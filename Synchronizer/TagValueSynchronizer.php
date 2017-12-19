<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\TagValueInterface;

class TagValueSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\TagValue';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\TagValueInterface';

    /**
     * @param \stdClass $tagValue
     * @param bool      $flush
     *
     * @return TagValueInterface
     */
    public function syncTagValue($tagValue, $flush = true)
    {
        /** @var TagValueInterface $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $tagValue->id,
        ]);
        if (!($entity)) {
            $entity = new $this->entityClassName();
            $entity->setExternalId($tagValue->id);
        }

        $entity
            ->setSortOrder($tagValue->sortOrder)
        ;

        foreach ($tagValue->translations as $tagValueTranslation) {
            $entity
                ->translate($languages[$tagValueTranslation->siteId]['id'])
                ->setText($tagValueTranslation->text)
            ;
        }

        $this->objectManager->persist($entity);
        $entity->mergeNewTranslations();

        if ($flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
