<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\PaymentLine;
use \Loevgaard\Dandomain\Pay\PaymentRequest\PaymentLine as DandomainPaymentLine;

/**
 * @method PaymentLine create()
 * @method delete(PaymentLine $obj)
 * @method update(PaymentLine $obj, $flush = true)
 */
class PaymentLineManager extends Manager
{
    /**
     * This will transform a PaymentRequest (parent) to a Payment (child)
     *
     * @param DandomainPaymentLine $dandomainPaymentLine
     * @return PaymentLine
     */
    public function createPaymentLineFromDandomainPaymentRequest(DandomainPaymentLine $dandomainPaymentLine)
    {
        $paymentLine = $this->create();

        $methods = get_class_methods($dandomainPaymentLine);

        foreach ($methods as $method) {
            if(substr($method, 0, 3) === 'get') {
                $val = $dandomainPaymentLine->{$method}();
                $property = substr($method, 3);
            } elseif (substr($method, 0, 2) === 'is') {
                $val = $dandomainPaymentLine->{$method}();
                $property = substr($method, 2);
            } else {
                continue;
            }

            if(!is_scalar($val)) {
                continue;
            }

            $setter = 'set'.$property;

            if(method_exists($paymentLine, $setter)) {
                $paymentLine->{$setter}($val);
            }
        }

        return $paymentLine;
    }
}