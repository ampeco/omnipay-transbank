<?php

namespace Ampeco\OmnipayTransbank\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    /**
     * @param AbstractRequest $request
     * @param $data
     * @param int $statusCode
     */
    public function __construct(AbstractRequest $request, $data)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true, flags: JSON_THROW_ON_ERROR);
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

    public function isSuccessful(): bool
    {
        return $this->getCode() < 400 && !$this->getErrorMessage();
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}
