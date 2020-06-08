<?php

namespace App;

use URL;
use Config;

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment; //ProductionEnvironment for production calls

class PayPal
{
    public $client, $environment;
    public function __construct()
    {

        $clientid = Config::get('services.paypal.clientid');
        $secret = Config::get('services.paypal.secret');

        $this->environment = new SandboxEnvironment($clientid, $secret);

        $this->client = new PayPalHttpClient($this->environment);
    }
    // Solicitud de cobro
    public function buildPaymentRequest($amount)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');

        $body = [
            'intent' => 'AUTHORIZE',
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "total" => $amount,
                    "currency" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => "/",   //URL::route('shopping_cart.show'),
                "return_url" =>  "/"         //URL::route('payments.execute')
            ]
        ];

        $request->body = $body;

        return $request;
    }
    public function charge($amount)
    {
        return $this->client->execute($this->buildPaymentRequest($amount));
    }
}
