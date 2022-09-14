<?php

namespace Ampeco\OmnipayTransbank;

use Ampeco\OmnipayQorPay\Message\AbstractRequest;
use Ampeco\OmnipayQorPay\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    public function getName()
    {
        return 'Transbank';
    }

    public function createCard(array $options = []): string
    {
        return '';
    }

    public function deleteCard(array $parameters = [])
    {
        return false;
    }

    protected function createRequest($class, array $parameters)
    {
        /** @var AbstractRequest */
        $req = parent::createRequest($class, $parameters);

        return $req->setGateway($this);
    }

    public function purchase(array $parameters)
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }
}
