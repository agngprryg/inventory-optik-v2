<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToDistributor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributor', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('nama_distributor');
            $table->string('no_telepon', 20)->nullable()->after('logo');
            $table->string('email')->unique()->after('no_telepon');
            $table->text('alamat')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('distributor', function (Blueprint $table) {
            $table->dropColumn(['logo', 'no_telepon', 'email', 'alamat']);
        });
    }
}
