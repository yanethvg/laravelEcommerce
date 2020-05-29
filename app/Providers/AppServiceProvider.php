<?php

namespace App\Providers;

use App\ShoppingCart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //lo que se quiere es que el carrito de compra este disponible en toda la aplicacion
        //$sessionName = 'shopping_cart_id';

        //session($sessionName);
        //$shopping_cart_id =  $request->session()->get($sessionName);
        //$shopping_cart_id = \Session::get($sessionName);
        //\Session::get($sessionName)

        //buscando si existe la sesion
        //$shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);

        //ingresando la session en el navegador
        //\Session::put($sessionName,$shopping_cart->id);

        //esto hace que siempre se cree
        //view()->share('productsCount', $shopping_cart->id);

        //cualquier vista puede ejecutar esta funcion
        view()->composer('*', function($view){
            $sessionName = 'shopping_cart_id';
            $shopping_cart_id = \Session::get($sessionName);

            $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
            \Session::put($sessionName,$shopping_cart->id);

            $view->with('productsCount', $shopping_cart->id);
        });
    }
}
