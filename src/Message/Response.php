<?php

namespace Ampeco\OmnipayTransbank\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    protected int $statusCode;

    /**
     * @param RequestInterface $request
     * @param $data
     * @param int $statusCode
     */
    public function __construct(AbstractRequest $request, $data, int $statusCode)
    {
        parent::__construct($request, $data);
        $this->data = json_decode($data, true, flags: JSON_THROW_ON_ERROR);
        $this->statusCode = $statusCode;
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
        return $this->statusCode < 400 && !$this->getErrorMessage();
    }
}
