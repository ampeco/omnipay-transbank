<?php

namespace Ampeco\OmnipayTransbank\Message;

use Omnipay\Common\Message\NotificationInterface;

class NotificationResponse extends Response implements NotificationInterface
{
    public function getToken(): string
    {
        return @$this->data['tbk_user'];
    }

    public function getCardType(): string
    {
        return @$this->data['card_type'];
    }

    public function getCardNumber(): string
    {
        return @$this->data['card_number'];
    }

    public function isSuccessful(): bool
    {
        return parent::isSuccessful() && @$this->data['response_code'] === 0;
    }

    public function getTransactionStatus(): string
    {
        return $this->isSuccessful() ? NotificationInterface::STATUS_COMPLETED : NotificationInterface::STATUS_FAILED;
    }

    public function getMessage(): ?string
    {
        return @$this->data['error_message'];
    }

    public function isForTokenization(): bool
    {
        return isset($this->data['tbk_user']);
    }
}
