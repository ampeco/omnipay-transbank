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
        return "<body onload='document.transbankForm.submit();'>
        <form name='transbankForm' action='{$this->getUrlWebPay()}'  method='POST'>
           <input type='hidden' name='TBK_TOKEN' value='{$this->getToken()}'/>
        </form></body>";

    }

    public function isRedirect()
    {
        return true;
    }
}
