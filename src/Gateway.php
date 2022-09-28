<?php

namespace Ampeco\OmnipayTransbank;

use Ampeco\OmnipayTransbank\Message\CreateCardRequest;
use Ampeco\OmnipayTransbank\Message\DeleteCardRequest;
use Ampeco\OmnipayTransbank\Message\GetInscriptionTokenRequest;
use Ampeco\OmnipayTransbank\Message\NotificationRequest;
use Ampeco\OmnipayTransbank\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use CommonParameters;

    public function getName(): string
    {
        return 'Transbank';
    }

    public function createCard(array $options = [])
    {
        return $this->createRequest(CreateCardRequest::class, $options);
    }

    public function deleteCard(array $parameters = [])
    {
        return $this->createRequest(DeleteCardRequest::class, $parameters);
    }

    protected function createRequest($class, array $parameters)
    {
        /** @var AbstractRequest */
        $req = parent::createRequest($class, $parameters);

        return $req->setGateway($this);
    }

    public function acceptNotification(array $requestData)
    {
        return $this->createRequest(NotificationRequest::class, $requestData)->send();
    }

    public function purchase(array $parameters)
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }
}
