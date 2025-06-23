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
        Schema::table('vp_comments', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('vp_users')->onDelete('CASCADE');
            $table->foreign(['com_product'])->references(['prod_id'])->on('vp_products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vp_comments', function (Blueprint $table) {
            $table->dropForeign('vp_comments_user_id_foreign');
            $table->dropForeign('vp_comments_com_product_foreign');
        });
    }
};
