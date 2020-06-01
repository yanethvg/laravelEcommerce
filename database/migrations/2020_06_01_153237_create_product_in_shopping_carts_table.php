<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_in_shopping_carts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("product_id")->unsigned();
            $table->foreign("product_id")->references("id")->on("products");

            $table->bigInteger("shopping_cart_id")->unsigned();
            $table->foreign("shopping_cart_id")->references("id")->on("shopping_carts");

            $table->integer("amount")->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_in_shopping_carts');
    }
}
