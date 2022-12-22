<?php

use Illuminate\Console\View\Components\Task;
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
        Schema::create('minat_bakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('panitia_id');
            $table->string('mapel_unggul');
            $table->string('mapel_rendah');
            $table->string('kehadiran');
            $table->string('kenaikan');
            $table->string('sikap');
            $table->integer('rata_rata');
            $table->string('smt_1')->nullable();
            $table->string('smt_2')->nullable();
            $table->string('smt_3')->nullable();
            $table->string('smt_4')->nullable();
            $table->string('smt_5')->nullable();
            $table->string('smt_6')->nullable();
            $table->string('smt_7')->nullable();
            $table->string('smt_8')->nullable();
            $table->string('smt_9')->nullable();
            $table->string('smt_10')->nullable();
            $table->string('smt_11')->nullable();
            $table->string('smt_12')->nullable();
            $table->string('non_akademik')->nullable();
            $table->foreignId('ekstra_id');
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
        Schema::dropIfExists('minat_bakats');
    }
};
