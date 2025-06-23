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
        Schema::table('vp_favourite_products', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('vp_users')->onDelete('CASCADE');
            $table->foreign(['favou_product'])->references(['prod_id'])->on('vp_products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vp_favourite_products', function (Blueprint $table) {
            $table->dropForeign('vp_favourite_products_user_id_foreign');
            $table->dropForeign('vp_favourite_products_favou_product_foreign');
        });
    }
};
