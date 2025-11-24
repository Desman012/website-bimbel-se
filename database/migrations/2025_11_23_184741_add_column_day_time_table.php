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
        Schema::table('day_time', function (Blueprint $table) {
            //
            // Tambah kolom
            $table->unsignedBigInteger('id_class')->nullable()->after('id');

            // Tambah FK
            $table->foreign('id_class')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('day_time', function (Blueprint $table) {
            //
            // Hapus FK dulu
            $table->dropForeign(['id_class']);

            // Hapus kolom
            $table->dropColumn('id_class');
        });
    }
};
