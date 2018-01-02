<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundation\Entity\Tag;
use Loevgaard\DandomainFoundationBundle\Entity\TagRepositoryInterface;

class TagUpdater implements TagUpdaterInterface
{
    /**
     * @var TagRepositoryInterface
     */
    protected $tagRepository;

    /**
     * @var TagValueUpdaterInterface
     */
    protected $tagValueUpdater;

    public function __construct(TagRepositoryInterface $tagRepository, TagValueUpdaterInterface $tagValueUpdater)
    {
        $this->tagRepository = $tagRepository;
        $this->tagValueUpdater = $tagValueUpdater;
    }

    public function updateFromApiResponse(array $data): TagInterface
    {
        $tag = $this->tagRepository->findOneByExternalId($data['id']);
        if (!$tag) {
            $tag = new Tag();
            $tag->setExternalId($data['id']);
        }

        $tag
            ->setSelectorType($data['selectorType'])
            ->setSortOrder($data['sortOrder']);

        foreach ($data['translations'] as $translation) {
            $tag->translate($translation['siteId'])->setText($translation['text']);
        }

        $tag->mergeNewTranslations();

        foreach ($data['values'] as $dataTagValue) {
            $tagValue = $this->tagValueUpdater->updateFromEmbeddedApiResponse($dataTagValue);
            $tag->addTagValue($tagValue);
        }

        return $tag;
    }
}
