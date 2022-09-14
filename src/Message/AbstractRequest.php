<?php

namespace Ampeco\OmnipayTransbank\Message;

use Ampeco\OmnipayTransbank\Gateway;
use Omnipay\Common\Message\AbstractRequest as OmniPayAbstractRequest;

abstract class AbstractRequest extends OmniPayAbstractRequest
{
    abstract public function getEndpoint();

    const API_URL_TEST = 'https://webpay3gint.transbank.cl/rswebpaytransaction/api/oneclick/v1.2/';

    const API_URL_PROD = 'https://webpay3g.transbank.cl/rswebpaytransaction/api/oneclick/v1.2/';

    protected ?Gateway $gateway;

    public function setGateway(Gateway $gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    public function getGateway()
    {
        return $this->gateway;
    }

    public function getBaseUrl()
    {
        return $this->getTestMode() ? static::API_URL_TEST : static::API_URL_PROD;
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Tbk-Api-Key-Id' => $this->gateway->getApiKeyId(),
            'Tbk-Api-Key-Secret' => $this->gateway->getApiKeySecret(),
        ];
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getBaseUrl() . ltrim($this->getEndpoint(), '/'),
            $this->getHeaders(),
            json_encode($data),
        );

        return $this->createResponse(
            $httpResponse->getBody()->getContents(),
            $httpResponse->getStatusCode(),
        );
    }
}
