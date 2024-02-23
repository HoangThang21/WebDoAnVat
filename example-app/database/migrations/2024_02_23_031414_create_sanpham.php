<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensampham');
            $table->integer('gia');
            $table->string('hinh');
            $table->longText('mota');
            $table->integer('danhgia');
            $table->integer('soluongton');
            $table->integer('soluongdaban');
            $table->integer('id_danhmuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
