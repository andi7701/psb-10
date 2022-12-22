<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('panitia_id');
            $table->string('sumber_informasi');
            $table->string('alasan');
            $table->string('alasan_orang_tua');
            $table->string('minat_lain');
            $table->string('pilihan_ke');
            $table->string('jumlah_anak');
            $table->string('status_ayah');
            $table->string('status_ibu');
            $table->string('kondisi_keluarga');
            $table->string('kondisi_ayah');
            $table->string('kondisi_ibu');
            $table->string('tinggal_bersama');
            $table->string('penanggung_jawab');
            $table->string('penjamin_biaya');
            $table->string('pekerjaan_penjamin');
            $table->string('kesopanan');
            $table->integer('nilai');
            $table->string('catatan');
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
        Schema::dropIfExists('wawancaras');
    }
};
