<?php

namespace Loevgaard\DandomainFoundationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryTranslationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoryNumber')
            ->add('description')
            ->add('externalId')
            ->add('hidden')
            ->add('hiddenMobile')
            ->add('icon')
            ->add('image')
            ->add('keywords')
            ->add('link')
            ->add('metaDescription')
            ->add('name')
            ->add('siteId')
            ->add('sortOrder')
            ->add('string')
            ->add('title')
            ->add('urlname')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Loevgaard\DandomainFoundationBundle\Model\CategoryTranslation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'loevgaard_dandomain_foundation_bundle_category_translation';
    }
}
