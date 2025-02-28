<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;

class CreatePaymentLink extends AbstractRequest implements IRequest
{
    protected $amount;
    protected $channel = 1;
    protected $currency;
    protected $description;
    protected $control;
    protected $language;
    protected $onlinetransfer = 1;
    protected $ch_lock = 0;
    protected $redirection_type = 0;
    protected $buttontext = 'Return';
    protected $url;
    protected $urlc;
    protected $expiration_datetime;
    protected $payer = [];
    protected $recipient = [];

    public function __construct($shop_id, $data)
    {
        parent::__construct($shop_id);
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function method()
    {
        return 'POST';
    }

    public function path()
    {
        return 'api/v1/accounts/'.$this->shop_id.'/payment_links/';
    }

    public function toArray()
    {
        $array =  parent::toArray();

        //If channel is <= 0 then we remove it
        if ($this->channel <= 0)
            unset($array['channel']);

        return $array;
    }
}
