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
        Schema::create('agamas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('panitia_id');
            $table->string('mahroj')->nullable();
            $table->string('lancar')->nullable();
            $table->string('tajwid')->nullable();
            $table->string('qunut')->nullable();
            $table->string('tahiyat')->nullable();
            $table->string('kesopanan')->nullable();
            $table->string('catatan')->nullable();
            $table->integer('nilai');
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
        Schema::dropIfExists('agamas');
    }
};
