<?php
namespace Loevgaard\DandomainFoundationBundle\Entity;

use Loevgaard\DandomainFoundation\Entity\Generated\CategoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function findOneByNumber(string $number) : ?CategoryInterface
    {
        /** @var CategoryInterface $obj */
        $obj = $this->repository->findOneBy([
            'number' => $number
        ]);

        return $obj;
    }

    /**
     * @return \Generator|CategoryInterface[]
     */
    public function iterator(array $options = []) : \Generator
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $options = $resolver->resolve($options);

        $qb = $this->repository->createQueryBuilder('c');

        $result = $qb->getQuery()->iterate();
        $i = 1;
        foreach ($result as $item)
        {
            /** @var CategoryInterface $obj */
            $obj = $item[0];
            yield $obj;

            if($options['update']) {
                if($i % $options['bulkSize'] == 0) {
                    $this->manager->flush();
                    $this->manager->clear();
                }
            } else {
                $this->manager->detach($obj);
            }

            $i++;
        }
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'update' => true,
            'bulkSize' => 50
        ]);
    }
}