<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moa', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('pengusul_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('mou_id')->nullable();
            $table->string('nomor_moa')->nullable();
            $table->string('nomor_moa_pengusul');
            $table->string('pejabat_penandatangan');
            $table->string('nik_nip_pengusul')->nullable();
            $table->string('jabatan_pengusul');
            $table->text('program');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->text('dokumen')->nullable();
            $table->string('metode_pertemuan')->nullable();
            $table->date('tanggal_pertemuan')->nullable();
            $table->time('waktu_pertemuan')->nullable();
            $table->text('tempat_pertemuan')->nullable();
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
        Schema::dropIfExists('moa');
    }
}