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
        Schema::create('seragams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('baju_osis');
            $table->string('baju_batik');
            $table->string('baju_pramuka');
            $table->string('baju_or');
            $table->string('bawah_osis');
            $table->string('bawah_batik');
            $table->string('bawah_pramuka');
            $table->string('bawah_or');
            $table->integer('peci')->nullable();
            $table->foreignId('panitia_id');
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
        Schema::dropIfExists('seragams');
    }
};
