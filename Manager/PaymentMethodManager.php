<?php
namespace Loevgaard\DandomainFoundationBundle\Manager;

use Loevgaard\DandomainFoundationBundle\Model\PaymentMethodInterface;

class PaymentMethodManager extends Manager
{
    /**
     * @return PaymentMethodInterface
     */
    public function create()
    {
        return parent::_create();
    }

    /**
     * @param PaymentMethodInterface $obj
     */
    public function delete(PaymentMethodInterface $obj)
    {
        parent::_delete($obj);
    }

    /**
     * @param PaymentMethodInterface $obj The entity
     * @param bool $flush
     */
    public function update(PaymentMethodInterface $obj, $flush = true)
    {
        parent::_update($obj, $flush);
    }

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