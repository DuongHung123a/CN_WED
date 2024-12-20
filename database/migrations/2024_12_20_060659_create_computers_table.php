<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('computer_name', 50); // Tên máy tính
            $table->string('model', 100); // Model
            $table->string('operating_system', 50)->nullable(); // Hệ điều hành
            $table->string('processor', 50)->nullable(); // Bộ vi xử lý
            $table->integer('memory')->nullable(); // Bộ nhớ RAM
            $table->boolean('available')->default(true); // Trạng thái hoạt động
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
