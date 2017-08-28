<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\Dandomain\Pay\PaymentRequest;
use Loevgaard\DandomainFoundationBundle\Model\Payment;

/**
 * @method Payment create()
 * @method delete(Payment $obj)
 * @method update(Payment $obj, $flush = true)
 */
class PaymentManager extends Manager
{
    /**
     * This will transform a PaymentRequest (parent) to a Payment (child)
     *
     * @param PaymentRequest $paymentRequest
     * @return Payment
     */
    public function createPaymentFromDandomainPaymentRequest(PaymentRequest $paymentRequest)
    {
        $payment = $this->create();

        $methods = get_class_methods($paymentRequest);

        foreach ($methods as $method) {
            if(substr($method, 0, 3) === 'get') {
                $val = $paymentRequest->{$method}();
                $property = substr($method, 3);
            } elseif (substr($method, 0, 2) === 'is') {
                $val = $paymentRequest->{$method}();
                $property = substr($method, 2);
            } else {
                continue;
            }

            if(!is_scalar($val)) {
                continue;
            }

            $setter = 'set'.$property;

            if(method_exists($payment, $setter)) {
                $payment->{$setter}($val);
            }
        }

        return $payment;
    }
}