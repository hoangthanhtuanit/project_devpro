<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->comment('Họ đệm chủ tài khoản');
            $table->string('last_name')->comment('Tên chủ tài khoản');
            $table->string('avatar',255)->comment('Ảnh đại diện');
            $table->string('email')->comment('Tên đăng nhập');
            $table->string('password')->comment('Mật khẩu đăng nhập');
            $table->tinyInteger('status')->comment('Trạng thái tài khoản: 0 - Inactive, 1 - Active')->default(0);
            $table->tinyInteger('level')->comment('Quyền của tài khoản: 0 - Khách hàng, 1 - Nhân viên, 2 - Admin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
