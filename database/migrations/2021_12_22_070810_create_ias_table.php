<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ia', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('pengusul_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('moa_id');
            $table->string('nomor_ia');
            $table->string('nomor_ia_pengusul');
            $table->string('nik_nip_pengusul');
            $table->string('jabatan_pengusul');
            $table->text('program');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->text('dokumen');
            $table->text('laporan_hasil_pelaksanaan')->nullable();
            $table->bigInteger('nilai_uang');
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
        Schema::dropIfExists('ia');
    }
}