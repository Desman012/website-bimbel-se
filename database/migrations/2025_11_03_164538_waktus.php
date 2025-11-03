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
        Schema::create('waktus', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->string('nama_waktu', 50); // Contoh: “Siang (12.00–13.00)”, “Sore (15.00–16.00)”
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waktus');
    }
};
