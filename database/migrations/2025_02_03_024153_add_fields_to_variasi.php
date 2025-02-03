<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToVariasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variasi', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->after('id');
            $table->string('nama_variasi');
            $table->enum('tipe', ['Pilihan', 'Isian']);
            $table->json('opsi')->nullable();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variasi', function (Blueprint $table) {
            $table->dropColumn(['id_kategori', 'nama_variasi', 'tipe', 'opsi']);
        });
    }
}
