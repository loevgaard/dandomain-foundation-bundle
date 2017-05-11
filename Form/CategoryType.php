<?php

namespace AppBundle\Form;

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
        $builder->add('consignment')->add('textDescription')->add('textHidden')->add('textMetaDescription')->add('textName')->add('textTitle')->add('textUrlname')->add('b2bGroupId')->add('createdDate')->add('customInfoLayout')->add('customListLayout')->add('defaultParentId')->add('editedDate')->add('externalId')->add('infoLayout')->add('internalId')->add('listLayout')->add('modified')->add('parentIdList')->add('segmentIdList')->add('textKeywords')->add('textCategoryNumber')->add('textExternalId')->add('textHiddenMobile')->add('textIcon')->add('textImage')->add('textLink')->add('textSiteId')->add('textSortOrder')->add('textString')->add('createdBy')->add('updatedBy')->add('deletedAt')->add('createdAt')->add('updatedAt')->add('products');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_category';
    }


}
