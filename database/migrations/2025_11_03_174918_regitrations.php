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
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('role_id'); 
            $table->string('full_name', 100);
            $table->text('address');
            $table->string('phone_number', 20);
            $table->string('student_email', 100)->unique();
            $table->string('password', 255);
            $table->string('parent_name', 100);
            $table->string('parent_email', 100)->nullable();
            $table->string('parent_phone', 20)->nullable();
            $table->unsignedBigInteger('levels_id');
            $table->unsignedBigInteger('class_id')->nullable(); 
            $table->unsignedBigInteger('programs_id');
            $table->unsignedBigInteger('_id');
            $table->unsignedBigInteger('time_les_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('levels_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('programs_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('_id')->references('id')->on('curriculums')->onDelete('cascade');
            $table->foreign('time_les_id')->references('id')->on('times')->onDelete('cascade');

            $table->enum('status', ['pending', 'active', 'inactive', 'ditolak'])->default('pending');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
