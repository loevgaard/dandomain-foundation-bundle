# Dandomain Foundation Bundle

1. Follow the instructions to install [Dandomain API Bundle](https://github.com/loevgaard/dandomain-api-bundle)
2. Register bundle with the AppKernel
3. Create Entity classes
4. Go crazy!

```php
<?php

class AppKernel
{
    function registerBundles()
    {
        $bundles = array(
            //...
            new Dandomain\ApiBundle\DandomainApiBundle(),
            new Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),
            new Loevgaard\DandomainFoundationBundle\LoevgaardDandomainFoundationBundle(),
            //...
        );

        //...

        return $bundles;
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Category as BaseCategory;

/**
 * @ORM\Entity()
 * @ORM\Table(name="categories")
 */
class Category extends BaseCategory
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="categories", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="customers")
 */
class Customer extends BaseCustomer
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Delivery as BaseDelivery;

/**
 * @ORM\Entity()
 * @ORM\Table(name="deliveries")
 */
class Delivery extends BaseDelivery
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Invoice as BaseInvoice;

/**
 * @ORM\Entity()
 * @ORM\Table(name="invoices")
 */
class Invoice extends BaseInvoice
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Manufacturer as BaseManufacturer;

/**
 * @ORM\Entity()
 * @ORM\Table(name="manufacturers")
 */
class Manufacturer extends BaseManufacturer
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="manufacturers", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Media as BaseMedia;

/**
 * @ORM\Entity()
 * @ORM\Table(name="media")
 */
class Media extends BaseMedia
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="medias", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Order as BaseOrder;

/**
 * @ORM\Entity()
 * @ORM\Table(name="orders")
 */
class Order extends BaseOrder
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var Customer
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"persist", "remove"})
     */
    protected $customer;

    /**
     * @var Delivery
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Delivery", cascade={"persist", "remove"})
     */
    protected $delivery;

    /**
     * @var Invoice
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Invoice", cascade={"persist", "remove"})
     */
    protected $invoice;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="order", targetEntity="OrderLine", cascade={"persist", "remove"})
     */
    protected $orderLines;

    /**
     * @var PaymentMethod
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="PaymentMethod", cascade={"persist", "remove"})
     */
    protected $paymentMethod;

    /**
     * @var ShippingMethod
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="ShippingMethod", cascade={"persist", "remove"})
     */
    protected $shippingMethod;

    /**
     * @var Site
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Site", cascade={"persist", "remove"})
     */
    protected $site;

    /**
     * @var State
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="State", cascade={"persist", "remove"})
     */
    protected $state;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\OrderLine as BaseOrderLine;

/**
 * @ORM\Entity()
 * @ORM\Table(name="order_lines")
 */
class OrderLine extends BaseOrderLine
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var Order
     *
     * @ORM\JoinColumn(name="order_id", onDelete="CASCADE", referencedColumnName="id", nullable=false)
     * @ORM\ManyToOne(inversedBy="orderLines", targetEntity="Order")
     */
    protected $order;

    /**
     * @var Product
     *
     * @ORM\JoinColumn(onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Product")
     */
    protected $product;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\PaymentMethod as BasePaymentMethod;

/**
 * @ORM\Entity()
 * @ORM\Table(name="payment_methods")
 */
class PaymentMethod extends BasePaymentMethod
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Period as BasePeriod;

/**
 * @ORM\Entity()
 * @ORM\Table(name="periods")
 */
class Period extends BasePeriod
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Price as BasePrice;

/**
 * @ORM\Entity()
 * @ORM\Table(name="prices")
 */
class Price extends BasePrice
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var Period
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $period;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="prices", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Loevgaard\DandomainFoundationBundle\Model\Product as BaseProduct;

/**
 * @ORM\Entity()
 * @ORM\Table(name="products")
 */
class Product extends BaseProduct
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_category")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Category")
     */
    protected $categories;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_disabled_variant")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="disabledProducts", targetEntity="Variant")
     */
    protected $disabledVariants;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_manufacturer")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Manufacturer")
     */
    protected $manufacturers;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_media")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Media")
     */
    protected $medias;

    /**
     * @var Period
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Period")
     */
    protected $pricePeriod;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_price")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Price")
     */
    protected $prices;

    /**
     * @var ProductRelation
     *
     * @ORM\JoinTable(name="product_product_relation")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="ProductRelation")
     */
    protected $productRelations;

    /**
     * @var ProductType
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="ProductType")
     */
    protected $productType;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_segment")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Segment")
     */
    protected $segments;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_variant")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="Variant")
     */
    protected $variants;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_variant_group")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="products", targetEntity="VariantGroup")
     */
    protected $variantGroups;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ProductRelation as BaseProductRelation;

/**
 * ProductRelation.
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_relations")
 */
class ProductRelation extends BaseProductRelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="productRelations", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Loevgaard\DandomainFoundationBundle\Model\ProductTranslation as BaseProductTranslation;

/**
 * @ORM\Entity()
 * @ORM\Table(name="product_translations")
 */
class ProductTranslation extends BaseProductTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var Period
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $periodFrontPage;

    /**
     * @var Period
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $periodHidden;

    /**
     * @var Period
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Period")
     */
    protected $periodNew;

    /**
     * @var Unit
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Unit")
     */
    protected $unit;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ProductType as BaseProductType;

/**
 * ProductType.
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_types")
 */
class ProductType extends BaseProductType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_type_product_type_field")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeField")
     */
    protected $productTypeFields;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_type_product_type_formula")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeFormula")
     */
    protected $productTypeFormulas;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="product_type_product_type_vat")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="productTypes", targetEntity="ProductTypeVat")
     */
    protected $productTypeVats;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ProductTypeField as BaseProductTypeField;

/**
 * ProductTypeField.
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_type_fields")
 */
class ProductTypeField extends BaseProductTypeField
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="productTypeFields", targetEntity="ProductType")
     */
    protected $productTypes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ProductTypeFormula as BaseProductTypeFormula;

/**
 * ProductTypeFormula.
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_type_formulas")
 */
class ProductTypeFormula extends BaseProductTypeFormula
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="productTypeFormulas", targetEntity="ProductType")
     */
    protected $productTypes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ProductTypeVat as BaseProductTypeVat;

/**
 * ProductTypeVat.
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_type_vats")
 */
class ProductTypeVat extends BaseProductTypeVat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="productTypeVats", targetEntity="ProductType")
     */
    protected $productTypes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Segment as BaseSegment;

/**
 * @ORM\Entity()
 * @ORM\Table(name="segments")
 */
class Segment extends BaseSegment
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="segments", targetEntity="Product")
     */
    protected $products;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ShippingMethod as BaseShippingMethod;

/**
 * @ORM\Entity()
 * @ORM\Table(name="shipping_methods")
 */
class ShippingMethod extends BaseShippingMethod
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Site as BaseSite;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sites")
 */
class Site extends BaseSite
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\State as BaseState;

/**
 * @ORM\Entity()
 * @ORM\Table(name="states")
 */
class State extends BaseState
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Unit as BaseUnit;

/**
 * @ORM\Entity()
 * @ORM\Table(name="units")
 */
class Unit extends BaseUnit
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Variant as BaseVariant;

/**
 * @ORM\Entity()
 * @ORM\Table(name="variants")
 */
class Variant extends BaseVariant
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="disabledVariants", targetEntity="Product")
     */
    protected $disabledProducts;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="Product")
     */
    protected $products;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="VariantGroup")
     */
    protected $variantGroups;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\VariantGroup as BaseVariantGroup;

/**
 * @ORM\Entity()
 * @ORM\Table(name="variant_groups")
 **/
class VariantGroup extends BaseVariantGroup
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(mappedBy="variantGroups", targetEntity="Product")
     */
    protected $products;

    /**
     * @var ArrayCollection
     *
     * @ORM\JoinTable(name="variant_group_variant")
     * @ORM\ManyToMany(cascade={"persist"}, inversedBy="variantGroups", targetEntity="Variant")
     */
    protected $variants;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
```

```yaml
loevgaard_dandomain_foundation:
    category_class: AppBundle\Entity\Category
    category_translation_class: AppBundle\Entity\CategoryTranslation
    customer_class: AppBundle\Entity\Customer
    default_site_id: "%default_site_id%"
    delivery_class: AppBundle\Entity\Delivery
    invoice_class: AppBundle\Entity\Invoice
    manufacturer_class: AppBundle\Entity\Manufacturer
    media_class: AppBundle\Entity\Media
    order_class: AppBundle\Entity\Order
    order_line_class: AppBundle\Entity\OrderLine
    payment_method_class: AppBundle\Entity\PaymentMethod
    period_class: AppBundle\Entity\Period
    price_class: AppBundle\Entity\Price
    product_class: AppBundle\Entity\Product
    product_relation_class: AppBundle\Entity\ProductRelation
    product_translation_class: AppBundle\Entity\ProductTranslation
    product_type_class: AppBundle\Entity\ProductType
    product_type_field_class: AppBundle\Entity\ProductTypeField
    product_type_formula_class: AppBundle\Entity\ProductTypeFormula
    product_type_vat_class: AppBundle\Entity\ProductTypeVat
    segment_class: AppBundle\Entity\Segment
    shipping_method_class: AppBundle\Entity\ShippingMethod
    site_class: AppBundle\Entity\Site
    state_class: AppBundle\Entity\State
    tag_class: AppBundle\Entity\Tag
    unit_class: AppBundle\Entity\Unit
    variant_class: AppBundle\Entity\Variant
    variant_group_class: AppBundle\Entity\VariantGroup
```
