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
        Schema::create('data_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori', 6)->unique()->primary();
            $table->string('nama_kategori', 15);
            $table->string('supplier', 20);
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kategori');
    }
};
