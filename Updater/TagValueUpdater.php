<?php

namespace Loevgaard\DandomainFoundationBundle\Updater;

use Loevgaard\DandomainFoundation\Entity\Generated\TagValueInterface;
use Loevgaard\DandomainFoundation\Entity\TagValue;
use Loevgaard\DandomainFoundation\Repository\TagValueRepository;

class TagValueUpdater implements TagValueUpdaterInterface
{
    /**
     * @var TagValueRepository
     */
    protected $tagValueRepository;

    /**
     * @var TagValueUpdaterInterface
     */
    protected $tagValueUpdater;

    public function __construct(TagValueRepository $tagValueRepository)
    {
        $this->tagValueRepository = $tagValueRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function updateFromEmbeddedApiResponse(array $data, bool $updateData = true): TagValueInterface
    {
        $tagValue = $this->tagValueRepository->findOneByExternalId($data['id']);

        if (!$tagValue) {
            $tagValue = new TagValue();
            $tagValue->setExternalId($data['id']);
        }

        if ($updateData) {
            $tagValue
                ->setSortOrder($data['sortOrder']);

            foreach ($data['translations'] as $translation) {
                $tagValue->translate($translation['siteId'])->setText($translation['text']);
            }

            $tagValue->mergeNewTranslations();
        }

        return $tagValue;
    }
}
