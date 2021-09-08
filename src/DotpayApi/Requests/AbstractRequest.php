<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

class AbstractRequest
{
    protected $shop_id;

    public function __construct($shop_id)
    {
        $this->shop_id = $shop_id;
    }

    public function toArray()
    {
        $array = get_object_vars($this);
        
        //Usuwamy shop_id po zaleceniach od DotPay
        unset($array['shop_id']);
        
        return $array;
    }
}
