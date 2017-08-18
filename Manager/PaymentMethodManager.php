<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\PaymentMethodInterface;

/**
 * @method PaymentMethodInterface create()
 * @method delete(PaymentMethodInterface $obj)
 * @method update(PaymentMethodInterface $obj, $flush = true)
 */
class PaymentMethodManager extends Manager
{
    /**
     * @param int $externalId
     * @param bool $fetch If true, we will try to fetch the payment method from Dandomain
     * @return PaymentMethodInterface|null
     */
    public function findByExternalId($externalId, $fetch = true) {
        /** @var PaymentMethodInterface $obj */
        $obj = $this->getRepository()->findOneBy([
            'externalId' => $externalId
        ]);

        if(!$obj && $fetch) {
            // @todo fetch from Dandomain
        }

        return $obj;
    }
}