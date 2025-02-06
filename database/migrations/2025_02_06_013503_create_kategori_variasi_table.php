<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kategori_variasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->foreignId('variasi_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_variasi');
    }
};
