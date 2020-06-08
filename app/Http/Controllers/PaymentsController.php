<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PayPal;
use App\Order;

use Session;


class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopping_cart');
    }

    public function pay(Request $request)
    {
        $amount = $request->shopping_cart->amount();

        $paypal = new PayPal();

        $response = $paypal->charge($amount);

        return dd($response);
        /*
        $redirectLinks = array_filter($response->result->links, function ($link) {
            return $link->method == 'REDIRECT';
        });

        $redirectLinks = array_values($redirectLinks);

        return redirect($redirectLinks[0]->href);*/
    }
}
