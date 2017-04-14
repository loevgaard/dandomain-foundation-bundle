# dandomain-foundation

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Category as BaseCategory;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Delivery as BaseDelivery;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Invoice as BaseInvoice;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Manufacturer as BaseManufacturer;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Order as BaseOrder;

/**
 * @ORM\Entity()
 * @ORM\Table()
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
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    protected $customer;

    /**
     * @var Delivery
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Delivery")
     */
    protected $delivery;

    /**
     * @var Invoice
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Invoice")
     */
    protected $invoice;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="order", onDelete="SET NULL", targetEntity="OrderLine")
     */
    protected $orderLines;

    /**
     * @var PaymentMethod
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     */
    protected $paymentMethod;

    /**
     * @var ShippingMethod
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="ShippingMethod")
     */
    protected $shippingMethod;

    /**
     * @var Site
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Site")
     */
    protected $site;

    /**
     * @var State
     *
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="State")
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\OrderLine as BaseOrderLine;

/**
 * @ORM\Entity()
 * @ORM\Table()
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
     * @ORM\JoinColumn(name="order_id", onDelete="SET NULL", referencedColumnName="id")
     * @ORM\ManyToOne(inversedBy="orderLines", targetEntity="Order")
     */
    protected $order;
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\PaymentMethod as BasePaymentMethod;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Period as BasePeriod;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Price as BasePrice;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\ShippingMethod as BaseShippingMethod;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Site as BaseSite;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\State as BaseState;

/**
 * @ORM\Entity()
 * @ORM\Table()
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


<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Variant as BaseVariant;

/**
 * @ORM\Entity()
 * @ORM\Table()
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
     * @ORM\ManyToMany(mappedBy="variants", targetEntity="Product")
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


<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\VariantGroup as BaseVariantGroup;

/**
 * @ORM\Entity()
 * @ORM\Table()
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
    customer_class: AppBundle\Entity\Customer
    default_site_id: "%default_site_id%"
    delivery_class: AppBundle\Entity\Delivery
    invoice_class: AppBundle\Entity\Invoice
    manufacturer_class: AppBundle\Entity\Manufacturer
    order_class: AppBundle\Entity\Order
    order_line_class: AppBundle\Entity\OrderLine
    payment_method_class: AppBundle\Entity\PaymentMethod
    period_class: AppBundle\Entity\Period
    price_class: AppBundle\Entity\Price
    shipping_method_class: AppBundle\Entity\ShippingMethod
    site_class: AppBundle\Entity\Site
    state_class: AppBundle\Entity\State
    variant_class: AppBundle\Entity\Variant
    variant_group_class: AppBundle\Entity\VariantGroup
```
