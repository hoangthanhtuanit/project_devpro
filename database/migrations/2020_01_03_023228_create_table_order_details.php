<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('order_id')->comment('Id của order tương ứng, là khóa ngoại liên kết với bảng orders');
            $table->integer('product_id')->comment('Id của product tương ứng, là khóa ngoại liên kết với bảng products');
            $table->integer('quantity')->comment('Số sản phẩm đã đặt');
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
        Schema::dropIfExists('order_details');
    }
}
