<?php

namespace Ampeco\OmnipayTransbank;

trait CommonParameters
{
    public function getApiKeyId()
    {
        return $this->getParameter('api_id');
    }

    public function setApiKeyId($value)
    {
        return $this->setParameter('api_id', $value);
    }

    public function getApiKeySecret()
    {
        return $this->getParameter('api_secret');
    }

    public function setApiKeySecret($value)
    {
        return $this->setParameter('api_secret', $value);
    }

    public function getCommerceCode()
    {
        return $this->getParameter('commerce_code');
    }

    public function setCommerceCode($value)
    {
        return $this->setParameter('commerce_code', $value);
    }

    public function getStoreCommerceCode()
    {
        return $this->getParameter('store_commerce_code');
    }

    public function setStoreCommerceCode($value)
    {
        return $this->setParameter('store_commerce_code', $value);
    }

    public function getClientEmail()
    {
        return $this->getParameter('client_email');
    }

    public function setClientEmail($value)
    {
        return $this->setParameter('client_email', $value);
    }
}
