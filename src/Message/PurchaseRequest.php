<?php

namespace Ampeco\OmnipayTransbank\Message;

class PurchaseRequest extends AbstractRequest
{
    protected string $clientUsername;

    public function setClientUsername($value)
    {
        return $this->clientUsername = $value;
    }

    public function getClientUsername()
    {
        return $this->clientUsername;
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getEndPoint(): string
    {
        return '/transactions';
    }

    public function getData()
    {
        return [
            'username' => $this->getClientUsername(),
            'tbk_user' => $this->getToken(),
            'buy_order' => $this->getTransactionId(),
            'details' => [
                [
                    //TODO get purchase commerceCode
                    'commerce_code' => $this->gateway->getStoreCommerceCode(),
                    'buy_order' => $this->getTransactionId(),
                    'amount' => $this->getAmount(),
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new PurchaseResponse($this, $data, $statusCode);
    }
}
