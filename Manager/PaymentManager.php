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
     * @param PaymentRequest $paymentRequest
     * @return Payment
     */
    public function createPaymentFromDandomainPaymentRequest(PaymentRequest $paymentRequest)
    {
        $payment = Payment::createFromPaymentRequest($paymentRequest);

        return $payment;
    }
}