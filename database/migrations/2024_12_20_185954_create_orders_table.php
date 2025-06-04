<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kh')->nullable();
            $table->string('hoten');
            $table->string('email');
            $table->string('sdt');
            $table->string('diachi');
            $table->text('note')->nullable();
            $table->string('phuongthucthanhtoan');
            $table->integer('tongtien');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

