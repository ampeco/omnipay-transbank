<?php

namespace Ampeco\OmnipayTransbank\Message;

class DeleteCardRequest extends AbstractRequest
{
    protected string $clientUsername;

    public function getEndPoint(): string
    {
        return '/inscriptions';
    }

    public function getHttpMethod(): string
    {
        return 'DELETE';
    }

    public function getData()
    {
        return [
            'username' => $this->getClientUsername(),
            'tbk_user' => $this->getToken(),
        ];
    }

    /**
     * @return string
     */
    public function getClientUsername(): string
    {
        return $this->clientUsername;
    }

    /**
     * @param string $clientUsername
     */
    public function setClientUsername(string $clientUsername): void
    {
        $this->clientUsername = $clientUsername;
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new Response($this, $data, $statusCode);
    }
}
