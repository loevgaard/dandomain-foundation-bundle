# dandomain-foundation

```php
<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Order as BaseOrder;

/**
 * @ORM\Entity
 * @ORM\Table
 **/
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
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    protected $customer;

    /**
     * @var Delivery
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Delivery")
     */
    protected $delivery;

    /**
     * @var Invoice
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Invoice")
     */
    protected $invoice;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="order", targetEntity="OrderLine")
     */
    protected $orderLines;

    /**
     * @var PaymentMethod
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="PaymentMethod")
     */
    protected $paymentMethod;

    /**
     * @var ShippingMethod
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="ShippingMethod")
     */
    protected $shippingMethod;

    /**
     * @var Site
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Site")
     */
    protected $site;

    /**
     * @var State
     *
     * @ORM\JoinColumn(nullable=true, referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="State")
     */
    protected $state;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity
 * @ORM\Table
 **/
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
 * @ORM\Entity
 * @ORM\Table
 **/
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
 * @ORM\Entity
 * @ORM\Table
 **/
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

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\OrderLine as BaseOrderLine;

/**
 * @ORM\Entity
 * @ORM\Table
 **/
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
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * @ORM\ManyToOne(inversedBy="orderLines", targetEntity="Order")
     */
    protected $order;
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundationBundle\Model\PaymentMethod as BasePaymentMethod;

/**
 * @ORM\Entity
 * @ORM\Table
 **/
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
use Loevgaard\DandomainFoundationBundle\Model\ShippingMethod as BaseShippingMethod;

/**
 * @ORM\Entity
 * @ORM\Table
 **/
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
 * @ORM\Entity
 * @ORM\Table
 **/
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
 * @ORM\Entity
 * @ORM\Table
 **/
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
