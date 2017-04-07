<?php

namespace Loevgaard\DandomainFoundationBundle\Synchronizer;

use Dandomain\Api\Api;
use Doctrine\ORM\EntityManager;
use Loevgaard\DandomainFoundationBundle\Model\CategoryInterface;

class CategorySynchronizer extends Synchronizer
{
    /**
     * @var string
     */
    protected $defaultSiteId = 'Loevgaard\\DandomainFoundationBundle\\Model\\CategoryInterface';

    /**
     * @var string
     */
    protected $entityClassName = 'Loevgaard\\DandomainFoundationBundle\\Model\\Category';

    /**
     * @var string
     */
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundationBundle\\Model\\CategoryInterface';

    /**
     * Constructor.
     *
     * @param EntityManager $em
     * @param Api           $api
     * @param string        $entityClassName
     * @param string        $defaultSiteId
     */
    public function __construct(EntityManager $em, Api $api, $entityClassName, $defaultSiteId)
    {
        parent::__construct($em, $api, $entityClassName);
        $this->defaultSiteId = $defaultSiteId;
    }

    /**
     * Synchronizes Category.
     *
     * @param array $category
     * @param bool  $flush
     *
     * @return CategoryInterface
     */
    public function syncCategory($category, $flush = true)
    {
        $entity = $this->objectManager->getRepository($this->entityClassName)->findOneBy([
            'externalId' => (int) $category->number,
        ]);

        if (!($entity)) {
            $entity = new $this->entityClassName();
        }

        $actualTexts = null;
        foreach ($category->texts as $text) {
            if ($text->siteId != $this->defaultSiteId) {
                continue;
            }

            $actualTexts = $text;
        }

        if (null !== $actualTexts) {
            return;
        }

        $entity
            ->setExternalId($category->number)
            ->setName($actualTexts->name)
            ->setDescription($actualTexts->description)
            ->setTitle($actualTexts->title)
            ->setMetaDescription($actualTexts->metaDescription)
            ->setHidden($actualTexts->hidden)
        ;

        $this->objectManager->persist($entity);

        if (true === $flush) {
            $this->objectManager->flush();
        }

        return $entity;
    }
}
