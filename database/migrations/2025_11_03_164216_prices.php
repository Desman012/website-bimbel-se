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
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('level_id'); 
            $table->unsignedBigInteger('class_id')->nullable(); 
            $table->decimal('price', 10, 2); 
            $table->timestamps(); 

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
