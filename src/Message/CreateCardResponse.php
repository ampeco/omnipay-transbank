<?php
namespace Ampeco\OmnipayTransbank\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class CreateCardResponse extends Response implements RedirectResponseInterface
{
    /**
     * @return string
     */
    public function getToken(): string
    {
        return @$this->data['token'];
    }

    /**
     * @return string
     */
    public function getUrlWebPay(): string
    {
        return @$this->data['url_webpay'];
    }

    public function getRedirectUrl()
    {
        return $this->getUrlWebPay() . '?TBK_TOKEN=' . $this->getToken();
    }

    public function isRedirect()
    {
        return true;
    }
}
