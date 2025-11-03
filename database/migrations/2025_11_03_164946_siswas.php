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
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID unik siswa (primary key)
            $table->unsignedBigInteger('role_id'); // FK ke roles.id
            $table->string('nama_lengkap', 100);
            $table->text('alamat');
            $table->string('no_hp_siswa', 20);
            $table->string('email_siswa', 100)->unique();
            $table->string('password', 255);
            $table->string('nama_ortu', 100);
            $table->string('email_ortu', 100)->nullable();
            $table->string('no_hp_ortu', 20)->nullable();
            $table->unsignedBigInteger('jenjang_id');
            $table->unsignedBigInteger('kelas_id')->nullable(); // TK/TKA bisa null
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('kurikulum_id');
            $table->unsignedBigInteger('waktu_les_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps(); // created_at & updated_at

            // Relasi Foreign Key
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelass')->onDelete('set null');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('kurikulum_id')->references('id')->on('kurikulums')->onDelete('cascade');
            $table->foreign('waktu_les_id')->references('id')->on('waktus')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
