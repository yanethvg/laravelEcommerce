<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInShoppingCart extends Model
{
    protected $fillable = [
        'shopping_cart_id', 'product_id',
    ];

}
