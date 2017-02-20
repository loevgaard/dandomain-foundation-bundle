<?php
namespace Loevgaard\DandomainFoundation\Synchronizer;

use Loevgaard\DandomainFoundation\Manager\StateManager;
use Loevgaard\DandomainFoundation\Model\State;

class StateSynchronizer extends Synchronizer {
    protected $entityInterfaceName = 'Loevgaard\\DandomainFoundation\\Model\\StateInterface';

    /** @var string */
    protected $entityClassName = 'Loevgaard\\DandomainFoundation\\Model\\State';

    public function syncStates($flush = true) {
        $states = \GuzzleHttp\json_decode($this->api->settings->getSites()->getBody()->getContents());

        /** @var StateManager $manager */
        $manager = $this->objectManager->getRepository($this->entityClassName);

        foreach ($states as $state) {
            /** @var State $entity */
            $entity = $manager->findStateByExternalId($state->id);

            if(!$entity) {
                $entity = new $this->entityClassName;
                $entity->setExternalId($state->id);
                $this->objectManager->persist($entity);
            }

            $entity
                ->setExclStatistics($state->exclStatistics)
                ->setDefault($state->isDefault)
                ->setName($state->name)
                ;

            if($flush) {
                $this->objectManager->flush();
            }
        }
    }
}