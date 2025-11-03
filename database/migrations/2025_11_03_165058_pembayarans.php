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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->string('bulan', 20);
            $table->decimal('jumlah_bayar', 10, 2);
            $table->string('bukti_bayar', 255);
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');

            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
