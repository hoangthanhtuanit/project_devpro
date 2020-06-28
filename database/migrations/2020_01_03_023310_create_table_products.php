<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories');
            $table->string('name',255)->comment('Tên sản phẩm');
            $table->string('image',255)->comment('Ảnh sản phẩm');
            $table->integer('price')->comment('Giá sản phẩm');
            $table->integer('sale')->comment('Phần trăm giảm giá sản phẩm')->default(0);
            $table->integer('quantity')->comment('Số lượng sản phẩm');
            $table->string('summary',255)->comment('Mô tả ngắn cho sản phẩm')->nullable();
            $table->text('content')->comment('Mô tả chi tiết cho sản phẩm')->nullable();
            $table->tinyInteger('status')->comment('Trạng thái sản phẩm: 0 - Disable, 1 - Active');
            $table->integer('lover')->comment('Số người thích')->default(0);
            $table->integer('quantity_sold')->comment('Số lượng sản phẩm đã bán')->default(0);
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
        Schema::dropIfExists('products');
    }
}
