<?php

namespace Loevgaard\DandomainFoundationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'A2lix\TranslationFormBundle\Form\Type\TranslationsFormsType', [
                'form_type' => 'Loevgaard\DandomainFoundationBundle\Form\CategoryTranslationType',
            ])
            ->add('b2bGroupId')
            ->add('customInfoLayout')
            ->add('customListLayout')
            ->add('defaultParentId')
            ->add('externalId')
            ->add('infoLayout')
            ->add('internalId')
            ->add('listLayout')
            ->add('modified')
            ->add('parentIdList')
            ->add('segmentIdList')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Loevgaard\DandomainFoundationBundle\Model\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'loevgaard_dandomain_foundation_bundle_category';
    }
}
