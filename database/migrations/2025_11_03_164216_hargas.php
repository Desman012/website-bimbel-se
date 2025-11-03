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
        Schema::create('hargas', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->unsignedBigInteger('jenjang_id'); // FK ke jenjang.id
            $table->unsignedBigInteger('kelas_id')->nullable(); // FK ke kelas.id (boleh null untuk TK/TKA)
            $table->decimal('harga', 10, 2); // Contoh: 200000.00
            $table->timestamps(); // created_at & updated_at

            // Relasi foreign key
            $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelass')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargas');
    }
};
