<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //ayuda a saber si hay sesiones iniciadas de carrito en el navegador
    public static function findOrCreateById($shopping_cart_id){
        if($shopping_cart_id){
          return ShoppingCart::find($shopping_cart_id);
        }else{
          return ShoppingCart::create();
        }
      }

}
