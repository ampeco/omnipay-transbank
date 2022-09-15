<?php
namespace Ampeco\OmnipayTransbank\Message;

class NotificationRequest extends AbstractRequest
{
    protected string $tokenConfirm;

    public function getEndPoint(): string
    {
        return '/inscriptions/' . $this->getTbkToken();
    }

    public function getHttpMethod(): string
    {
        return 'PUT';
    }

    public function getData()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getTbkToken(): string
    {
        return $this->tokenConfirm;
    }

    /**
     * @param string $tokenConfirm
     */
    public function setTbkToken(string $tbkToken): void
    {
        $this->tokenConfirm = $tbkToken;
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $statusCode)
    {
        return $this->response = new NotificationResponse($this, $data);
    }
}
