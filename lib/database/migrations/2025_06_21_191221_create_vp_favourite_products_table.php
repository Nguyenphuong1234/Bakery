<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_favourite_products', function (Blueprint $table) {
            $table->bigIncrements('favourite_id');
            $table->unsignedBigInteger('user_id')->index('vp_favourite_products_user_id_foreign');
            $table->unsignedBigInteger('favou_product')->index('vp_favourite_products_favou_product_foreign');
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
};
