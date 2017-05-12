<?php

namespace Loevgaard\DandomainFoundationBundle\Form;

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
        $builder
            ->add('barCodeNumber')
            ->add('number')
            ->add('stockCount')
            ->add('vendorNumber')
            ->add('categoryIdList')
            ->add('comments')
            ->add('costPrice')
            ->add('defaultCategoryId')
            ->add('disabledVariantIdList')
            ->add('edbPriserProductNumber')
            ->add('externalId')
            ->add('fileSaleLink')
            ->add('googleFeedCategory')
            ->add('isGiftCertificate')
            ->add('isModified')
            ->add('isRateVariants')
            ->add('isReviewVariants')
            ->add('isVariantMaster')
            ->add('locationNumber')
            ->add('manufacturereIdList')
            ->add('maxBuyAmount')
            ->add('minBuyAmount')
            ->add('minBuyAmountB2B')
            ->add('picture')
            ->add('salesCount')
            ->add('segmentIdList')
            ->add('sortOrder')
            ->add('stockLimit')
            ->add('typeId')
            ->add('variantGroupIdList')
            ->add('variantIdList')
            ->add('variantMasterId')
            ->add('weight')
            ->add('categories')
            ->add('disabledVariants')
            ->add('manufacturers')
            ->add('medias')
            ->add('parent')
            ->add('pricePeriod')
            ->add('prices')
            ->add('productRelations')
            ->add('productType')
            ->add('segments')
            ->add('variants')
            ->add('variantGroups');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Loevgaard\DandomainFoundationBundle\Model\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'loevgaard_dandomain_foundation_bundle_product';
    }
}
