<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('barCodeNumber')->add('categoriesRaw')->add('consignment')->add('costPriceExclVat')->add('hidden')->add('image')->add('name')->add('number')->add('priceInclVat')->add('stockCount')->add('vendorNumber')->add('version')->add('categoryIdList')->add('comments')->add('costPrice')->add('created')->add('createdBy')->add('defaultCategoryId')->add('disabledVariantIdList')->add('edbPriserProductNumber')->add('externalId')->add('fileSaleLink')->add('googleFeedCategory')->add('isGiftCertificate')->add('isModified')->add('isRateVariants')->add('isReviewVariants')->add('isVariantMaster')->add('locationNumber')->add('manufacturereIdList')->add('maxBuyAmount')->add('minBuyAmount')->add('minBuyAmountB2B')->add('picture')->add('salesCount')->add('segmentIdList')->add('sortOrder')->add('stockLimit')->add('typeId')->add('updated')->add('updatedBy')->add('variantGroupIdList')->add('variantIdList')->add('variantMasterId')->add('weight')->add('deletedAt')->add('createdAt')->add('updatedAt')->add('categories')->add('disabledVariants')->add('manufacturers')->add('medias')->add('parent')->add('pricePeriod')->add('prices')->add('productRelations')->add('productType')->add('segments')->add('variants')->add('variantGroups');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
