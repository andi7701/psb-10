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
        Schema::create('kesehatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('panitia_id');
            $table->string('tinggi')->nullable();
            $table->string('berat')->nullable();
            $table->string('kuku')->nullable();
            $table->string('rambut')->nullable();
            $table->string('buta_warna')->nullable();
            $table->string('minus')->nullable();
            $table->boolean('ngompol')->nullable();
            $table->boolean('rokok')->nullable();
            $table->string('sehat')->nullable();
            $table->string('darah')->nullable();
            $table->string('kesopanan')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('kesehatans');
    }
};
