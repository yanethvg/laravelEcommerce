<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#esta si maneja sesiones en api no
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/carrito','ShoppingCartController@show')->name('shopping_cart.show');
Route::get('/carrito/products','ShoppingCartController@products')->name('shopping_cart.products');

Route::get('/pagar','PaymentsController@pay')->name('payments.pay');
Route::get('/pagar/completar','PaymentsController@execute')->name('payments.execute');

Route::resource('products', 'ProductController');

Route::resource("in_shopping_carts","ProductInShoppingCartsController",[
    "only" => ["store","destroy"]
]);

Route::get('/home', 'HomeController@index')->name('home');


