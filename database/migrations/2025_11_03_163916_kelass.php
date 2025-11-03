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
            Schema::create('kelass', function (Blueprint $table) {
                $table->bigIncrements('id'); 
                $table->unsignedBigInteger('jenjang_id'); 
                $table->string('nama_kelas', 10); 
                $table->timestamps(); 

                $table->foreign('jenjang_id')->references('id')->on('jenjangs')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelass');
    }
};
