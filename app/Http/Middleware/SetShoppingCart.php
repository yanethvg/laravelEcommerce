<?php

namespace App\Http\Middleware;

use App\ShoppingCart;
use Closure;

class SetShoppingCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionName = 'shopping_cart_id';
        $shopping_cart_id = \Session::get($sessionName);

        $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);

        \Session::put($sessionName, $shopping_cart->id);

        $request->shopping_cart = $shopping_cart;

        return $next($request);

    }
}
