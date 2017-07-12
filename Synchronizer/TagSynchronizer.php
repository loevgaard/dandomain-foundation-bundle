<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Loevgaard\DandomainFoundationBundle\Model\TagInterface;

class TagSynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Tag';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\TagInterface';

    /**
     * @var TagValueSynchronizer
     */
    protected $tagValueSynchronizer;

    /**
     * @param TagValueSynchronizer $tagValueSynchronizer
     *
     * @return TagSynchronizer
     */
    public function setTagValueSynchronizer(TagValueSynchronizer $tagValueSynchronizer)
    {
        $this->tagValueSynchronizer = $tagValueSynchronizer;

        return $this;
    }

    /**
     * @param \stdClass $tag
     * @param bool      $flush
     *
     * @return TagInterface
     */
    public function syncTag($tag, $flush = true)
    {
        /** @var TagInterface $entity */
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => $tag->id
        ]);
        if (!($entity)) {
            $entity = new $this->entityClassName();
            $entity->setExternalId($tag->id);
        }

        $entity
            ->setSelectorType($tag->selectorType)
            ->setSortOrder($tag->sortOrder)
        ;

        foreach ($tag->translations as $translation) {
            $entity
                ->translate($languages[$translation->siteId]['id'])
                ->setText($translation->text)
            ;
        }

        foreach ($tag->values as $tagValue) {
            $entityTagValue = $this->tagValueSynchronizer->syncTagValue($tagValue);
            if($entityTagValue) {
                $entity->addTagValue($entityTagValue);
            }
        }

        $this->objectManager->persist($entity);
        $entity->mergeNewTranslations();

        if($flush) {
            $this->entityManager->flush();
        }

        return $entity;
    }
}
