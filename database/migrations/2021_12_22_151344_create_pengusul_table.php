<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengusulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengusul', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('alamat');
            $table->string('region');
            $table->string('negara_id');
            $table->string('provinsi_id');
            $table->string('kota_id');
            $table->string('kecamatan_id');
            $table->string('kelurahan_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('telepon');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengusul');
    }
}
