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
        // Schema::table('vp_products', function (Blueprint $table) {
        //     $table->foreign(['prod_cate'])->references(['cate_id'])->on('vp_categories')->onDelete('CASCADE');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('vp_products', function (Blueprint $table) {
        //     $table->dropForeign('vp_products_prod_cate_foreign');
        // });
    }
};
