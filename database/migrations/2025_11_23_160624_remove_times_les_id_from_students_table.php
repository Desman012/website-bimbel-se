<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // 1. Hapus foreign key
            $table->dropForeign(['time_les_id']);

            // 2. Baru hapus kolomnya
            $table->dropColumn('time_les_id');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Kembalikan kolomnya
            $table->unsignedBigInteger('time_les_id')->nullable();

            // Tambahkan kembali FK-nya
            $table->foreign('time_les_id')->references('id')->on('times')->onDelete('cascade');
        });
    }
};
