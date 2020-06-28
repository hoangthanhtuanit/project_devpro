<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users')->nullable();
            $table->string('first_name',255)->comment('Họ đệm khách hàng');
            $table->string('last_name',255)->comment('Tên khách hàng');
            $table->string('address',255)->comment('	Địa chỉ khách hàng');
            $table->string('phone_number',30)->comment('SĐT khách hàng');
            $table->string('email',255)->comment('	Email khách hàng');
            $table->text('note')->comment('Ghi chú từ khách hàng')->nullable();
            $table->integer('price_total')->comment('Tổng giá trị đơn hàng');
            $table->tinyInteger('payment')->comment('	Phương thức thanh toán: 0 - Tiền mặt, 1 - Chuyển khoản, 2 - Nhân viên chuyển phát thu hộ');
            $table->tinyInteger('status')->comment('Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
