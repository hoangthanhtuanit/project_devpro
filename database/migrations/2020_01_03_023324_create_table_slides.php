<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSlides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',255)->comment('File ảnh slide');
            $table->string('title',255)->comment('Tiêu đề slide');
            $table->string('summary',255)->comment('Mô tả ngắn cho slide');
            $table->integer('position')->comment('Vị trí hiển thị của slide, ví dụ: = 0 hiển thị đầu tiên');
            $table->tinyInteger('status')->comment('Trạng thái slide: 0 - Disable, 1 - Active')->default(0);
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
        Schema::dropIfExists('slides');
    }
}
