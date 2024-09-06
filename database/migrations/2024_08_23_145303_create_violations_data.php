<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->date('date');
            $table->time('time');
            $table->string('mime_type')->nullable(); // Untuk menyimpan MIME type file (misalnya image/jpeg)
            $table->binary('file_data')->nullable(); // Untuk menyimpan file gambar dalam bentuk binary (BLOB)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
