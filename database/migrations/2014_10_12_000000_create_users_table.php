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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('kode_daftar')->unique()->nullable();
            $table->string('password');
            $table->date('tanggal_daftar')->nullable();
            $table->string('slug');
            $table->foreignId('user_id')->nullable();
            $table->boolean('terukur')->default(0);
            $table->boolean('diterima')->nullable();
            $table->boolean('sudah_test')->default(0);
            $table->boolean('sudah_gaya')->default(0);
            $table->boolean('boleh_test')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
