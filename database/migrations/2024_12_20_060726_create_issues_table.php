<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade')->onUpdate('cascade'); // Khóa ngoại
            $table->string('reported_by', 50)->nullable(); // Người báo cáo
            $table->dateTime('reported_date')->nullable(); // Thời gian báo cáo
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->enum('urgency', ['Low', 'Medium', 'High'])->default('Low'); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved'])->default('Open'); // Trạng thái sự cố
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
        Schema::dropIfExists('issues');
    }
}
