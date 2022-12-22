<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\BuatRole;
use App\Http\Livewire\Daftar;
use App\Http\Livewire\DataPanitia;
use App\Http\Livewire\DataPendaftar;
use App\Http\Livewire\Home;
use App\Http\Livewire\InputAgama;
use App\Http\Livewire\InputKesehatan;
use App\Http\Livewire\InputMinatBakat;
use App\Http\Livewire\InputPengumuman;
use App\Http\Livewire\InputWawancara;
use App\Http\Livewire\Landing;
use App\Http\Livewire\Pendaftaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Landing::class)->name('landing');

Route::get('/home', Home::class)->name('home');

Route::get('daftar', Daftar::class)->name('daftar');

// Authenticated User
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // API
    Route::get('/users-kode-daftar', [ApiController::class, 'usersKodeDaftar'])->name('users-kode-daftar');



    // route for admin
    Route::middleware(['role:Admin'])->group(function () {

        Route::get('/buat-role', BuatRole::class)->name('buat-role');
        Route::get('/data-panitia', DataPanitia::class)->name('data-panitia');
        Route::get('/data-pendaftar', DataPendaftar::class)->name('data-pendaftar');
        Route::get('/pendaftaran', Pendaftaran::class)->name('pendaftaran');


        // Tes Seleksi
        Route::get('/admin/input-agama', InputAgama::class)->name('admin.input-agama');
        Route::get('/admin/input-kesehatan', InputKesehatan::class)->name('admin.input-kesehatan');
        Route::get('/admin/input-minat-bakat', InputMinatBakat::class)->name('admin.input-minat-bakat');
        Route::get('/admin/input-pengumuman', InputPengumuman::class)->name('admin.input-pengumuman');
        Route::get('/admin/input-wawancara', InputWawancara::class)->name('admin.input-wawancara');
    });

    // route for agama
    Route::middleware(['role:Agama'])->group(function () {

        Route::get('/agama/input-agama', InputAgama::class)->name('agama.input-agama');
    });

    // route for minat bakat
    Route::middleware(['role:Minat Bakat'])->group(function () {

        Route::get('/minat-bakat/input-minat-bakat', InputMinatBakat::class)->name('minat-bakat.input-minat-bakat');
    });
    
    // route for kesehatan
    Route::middleware(['role:Kesehatan'])->group(function () {

        Route::get('/kesehatan/input-kesehatan', InputKesehatan::class)->name('kesehatan.input-kesehatan');
    });

    // route for pengumuman
    Route::middleware(['role:Pengumuman'])->group(function () {

        Route::get('/pengumuman/input-pengumuman', InputPengumuman::class)->name('pengumuman.input-pengumuman');
    });

    // route for wawancara
    Route::middleware(['role:Wawancara'])->group(function () {

        Route::get('/wawancara/input-wawancara', InputWawancara::class)->name('wawancara.input-wawancara');
    });



    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
