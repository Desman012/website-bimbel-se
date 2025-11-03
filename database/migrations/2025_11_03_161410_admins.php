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
            Schema::create('admins', function (Blueprint $table) {
                $table->bigIncrements('id'); 
                $table->unsignedBigInteger('role_id'); 
                $table->string('nama_lengkap', 100);
                $table->text('alamat')->nullable();
                $table->string('email', 100)->unique();
                $table->string('password', 255);
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->timestamps(); 

                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
