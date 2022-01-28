<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mou', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('pengusul_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('nomor_mou');
            $table->string('nomor_mou_pengusul');
            $table->string('pejabat_penandatangan');
            $table->string('nik_nip_pengusul');
            $table->string('jabatan_pengusul');
            $table->text('program');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->text('dokumen');
            $table->string('metode_pertemuan');
            $table->date('tanggal_pertemuan');
            $table->time('waktu_pertemuan');
            $table->text('tempat_pertemuan');
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
        Schema::dropIfExists('mou');
    }
}