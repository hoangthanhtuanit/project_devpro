<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->comment('Tiêu đề tin tức');
            $table->string('summary',255)->comment('Mô tả ngắn cho tin tức');
            $table->string('image',255)->comment('Tên file ảnh tin tức');
            $table->text('content')->comment('Mô tả chi tiết cho sản phẩm');
            $table->integer('viewer')->comment('Số lượng người xem')->default(0);
            $table->tinyInteger('status')->comment('Trạng thái tin: 0 - Inactive, 1 - Active')->default(0);
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
        Schema::dropIfExists('news');
    }
}
