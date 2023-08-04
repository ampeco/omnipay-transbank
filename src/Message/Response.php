<?php

namespace Ampeco\OmnipayTransbank\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    private int $code;

    /**
     * @param AbstractRequest $request
     * @param $data
     * @param int $code
     */
    public function __construct(AbstractRequest $request, $data, int $code)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true);
        $this->code = $code;
    }

    /**
     * If request is not successful, error message is provided
     *
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return @$this->data['error_message'];
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function isSuccessful(): bool
    {
        return $this->getCode() < 400 && !$this->getErrorMessage();
    }

    public function getMessage(): string
    {
        return @$this->data['error_message'] ?? '';
    }
}
