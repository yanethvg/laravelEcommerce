<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shopping_cart');
      }

      public function show(Request $request){
        return view('shopping_cart.show',['shopping_cart' => $request->shopping_cart]);
      }

      public function products(Request $request){
        return new ProductCollection($request->shopping_cart->products()->get());
      }

}
