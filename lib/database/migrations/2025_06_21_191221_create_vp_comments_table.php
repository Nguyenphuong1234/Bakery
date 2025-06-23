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
        Schema::create('vp_comments', function (Blueprint $table) {
            $table->bigIncrements('com_id');
            $table->string('com_email');
            $table->string('com_name');
            $table->string('com_content');
            $table->integer('com_status')->default(0);
            $table->unsignedBigInteger('com_product')->index('vp_comments_com_product_foreign');
            $table->unsignedBigInteger('user_id')->index('vp_comments_user_id_foreign');
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
        Schema::dropIfExists('vp_comments');
    }
};
