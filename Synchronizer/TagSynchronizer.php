<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Loevgaard\DandomainFoundation;
use Loevgaard\DandomainFoundation\Entity\Generated\TagInterface;
use Loevgaard\DandomainFoundationBundle\Entity\TagRepositoryInterface;
use Loevgaard\DandomainFoundationBundle\Updater\TagUpdaterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagSynchronizer extends Synchronizer implements TagSynchronizerInterface
{
    /**
     * @var TagUpdaterInterface
     */
    protected $tagUpdater;

    public function __construct(TagRepositoryInterface $repository, Api $api, string $logsDir, TagUpdaterInterface $tagUpdater)
    {
        parent::__construct($repository, $api, $logsDir);

        $this->tagUpdater = $tagUpdater;
    }

    public function syncOne(array $options = []): ?TagInterface
    {
        throw new \RuntimeException('Method not implemented');
    }

    public function syncAll(array $options = [])
    {
        $pageSize = 100;
        $pages = \GuzzleHttp\json_decode((string) $this->api->productTag->getProductTagPageCount($pageSize));

        for($page = 1; $page <= $pages; $page++) {
            $tags = $this->api->productTag->getProductTagPage($page, $pageSize);
            foreach ($tags as $tag) {
                $entity = $this->tagUpdater->updateFromApiResponse(DandomainFoundation\objectToArray($tag));
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
