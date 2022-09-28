<?php

namespace Ampeco\OmnipayTransbank\Message;

class CreateCardRequest extends AbstractRequest
{
    protected string $clientUsername;

    protected string $clientEmail;

    public function setClientUsername($value)
    {
        return $this->clientUsername = $value;
    }

    public function getClientUsername()
    {
        return $this->clientUsername;
    }

    public function getClientEmail(): string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(string $clientEmail): void
    {
        $this->clientEmail = $clientEmail;
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getEndPoint(): string
    {
        return '/inscriptions';
    }

    public function getData()
    {
        return [
            'username' => $this->getClientUsername(),
            'email' => $this->getClientEmail(),
            'response_url' => $this->getNotifyUrl(),
        ];
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CreateCardResponse($this, $data, $statusCode);
    }
}
