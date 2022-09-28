<?php

namespace Ampeco\OmnipayTransbank\Message;

class PurchaseResponse extends Response
{
            //{
            //	"details": [
            //		{
            //			"amount": 700,
            //			"status": "AUTHORIZED",
            //			"authorization_code": "1213",
            //			"payment_type_code": "VN",
            //			"response_code": 0,
            //			"installments_number": 0,
            //			"commerce_code": "597055555542",
            //			"buy_order": "order_child_7"
            //		}
            //	],
            //	"buy_order": "order_parent_7",
            //	"card_detail": {
            //		"card_number": "6623"
            //	},
            //	"accounting_date": "0915",
            //	"transaction_date": "2022-09-15T06:54:17.393Z"
            //}

    public function isSuccessful(): bool
    {
        return parent::isSuccessful() && @$this->data['response_code'] === 0;
    }



}
