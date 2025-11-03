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
            Schema::create('absents', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->unsignedBigInteger('student_id');

                $table->date('date');
                $table->enum('attendance_status', ['present', 'absent']);

                $table->timestamps();

                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
