<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateVpFavouriteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_favourite_products', function (Blueprint $table) {
            $table->id('favourite_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('favou_product');
            $table->foreign('favou_product')->references('prod_id')->on('vp_products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('vp_users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_favourite_products');
    }
}
