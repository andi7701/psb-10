<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AturTes;
use App\Http\Livewire\BelumUkur;
use App\Http\Livewire\BuatRole;
use App\Http\Livewire\Daftar;
use App\Http\Livewire\DataPanitia;
use App\Http\Livewire\DataPendaftar;
use App\Http\Livewire\DetailPendaftar;
use App\Http\Livewire\Exam;
use App\Http\Livewire\HasilAgamaTerima;
use App\Http\Livewire\HasilAgamaTolak;
use App\Http\Livewire\HasilAkademikTerima;
use App\Http\Livewire\HasilAkademikTolak;
use App\Http\Livewire\HasilDiterima;
use App\Http\Livewire\HasilDitolak;
use App\Http\Livewire\HasilKesehatanTerima;
use App\Http\Livewire\HasilKesehatanTolak;
use App\Http\Livewire\HasilMinatTerima;
use App\Http\Livewire\HasilMinatTolak;
use App\Http\Livewire\HasilPengumumanTerima;
use App\Http\Livewire\HasilPengumumanTolak;
use App\Http\Livewire\HasilTes;
use App\Http\Livewire\HasilWawancaraTerima;
use App\Http\Livewire\HasilWawancaraTolak;
use App\Http\Livewire\Home;
use App\Http\Livewire\InputAgama;
use App\Http\Livewire\InputKesehatan;
use App\Http\Livewire\InputMinatBakat;
use App\Http\Livewire\InputPengumuman;
use App\Http\Livewire\InputWawancara;
use App\Http\Livewire\Landing;
use App\Http\Livewire\Pendaftaran;
use App\Http\Livewire\SudahUkur;
use App\Http\Livewire\UbahHasil;
use App\Http\Livewire\UkurSeragam;
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

    // Exam
    Route::get('/exam', Exam::class)->name('exam');

    // API
    Route::get('/users-kode-daftar', [ApiController::class, 'usersKodeDaftar'])->name('users-kode-daftar');
    Route::get('/users-diterima', [ApiController::class, 'usersDiterima'])->name('users-diterima');



    // route for admin
    Route::middleware(['role:Admin'])->group(function () {

        Route::get('admin/buat-role', BuatRole::class)->name('admin.buat-role');
        Route::get('admin/data-panitia', DataPanitia::class)->name('admin.data-panitia');
        Route::get('admin/data-pendaftar', DataPendaftar::class)->name('admin.data-pendaftar');
        Route::get('admin/detail-pendaftar/{user}', DetailPendaftar::class)->name('admin.detail-pendaftar');
        Route::get('admin/pendaftaran', Pendaftaran::class)->name('admin.pendaftaran');


        // Tes Seleksi
        Route::get('admin/input-agama', InputAgama::class)->name('admin.input-agama');
        Route::get('admin/input-kesehatan', InputKesehatan::class)->name('admin.input-kesehatan');
        Route::get('admin/input-minat-bakat', InputMinatBakat::class)->name('admin.input-minat-bakat');
        Route::get('admin/input-pengumuman', InputPengumuman::class)->name('admin.input-pengumuman');
        Route::get('admin/input-wawancara', InputWawancara::class)->name('admin.input-wawancara');

        //Atur Tes Akademik
        Route::get('admin/atur-test', AturTes::class)->name('admin.atur-test');
    });

    // route for agama
    Route::middleware(['role:Agama'])->group(function () {

        Route::get('agama/input-agama', InputAgama::class)->name('agama.input-agama');
        Route::get('agama/hasil-diterima', HasilAgamaTerima::class)->name('agama.hasil-diterima');
        Route::get('agama/hasil-ditolak', HasilAgamaTolak::class)->name('agama.hasil-ditolak');
    });

    // route for akademik
    Route::middleware(['role:Akademik'])->group(function () {

        Route::get('akademik/atur-test', AturTes::class)->name('akademik.atur-test');
        Route::get('akademik/hasil-test', HasilTes::class)->name('akademik.hasil-test');
        Route::get('akademik/hasil-diterima', HasilAkademikTerima::class)->name('akademik.hasil-diterima');
        Route::get('akademik/hasil-ditolak', HasilAkademikTolak::class)->name('akademik.hasil-ditolak');
    });

    // route for kesehatan
    Route::middleware(['role:Kesehatan'])->group(function () {

        Route::get('kesehatan/input-kesehatan', InputKesehatan::class)->name('kesehatan.input-kesehatan');
        Route::get('kesehatan/hasil-diterima', HasilKesehatanTerima::class)->name('kesehatan.hasil-diterima');
        Route::get('kesehatan/hasil-ditolak', HasilKesehatanTolak::class)->name('kesehatan.hasil-ditolak');
    });

    // route for minat bakat
    Route::middleware(['role:Minat Bakat'])->group(function () {

        Route::get('minat-bakat/input-minat-bakat', InputMinatBakat::class)->name('minat-bakat.input-minat-bakat');
        Route::get('minat-bakat/hasil-diterima', HasilMinatTerima::class)->name('minat-bakat.hasil-diterima');
        Route::get('minat-bakat/hasil-ditolak', HasilMinatTolak::class)->name('minat-bakat.hasil-ditolak');
    });


    //route for Pendaftaran
    Route::middleware(['role:Pendaftaran'])->group(function () {

        Route::get('pendaftaran/data-pendaftar', DataPendaftar::class)->name('pendaftaran.data-pendaftar');
        Route::get('pendaftaran/detail-pendaftar/{user}', DetailPendaftar::class)->name('pendaftaran.detail-pendaftar');
        Route::get('pendaftaran/pendaftaran', Pendaftaran::class)->name('pendaftaran.pendaftaran');
    });

    // route for pengumuman
    Route::middleware(['role:Pengumuman'])->group(function () {

        Route::get('pengumuman/input-pengumuman', InputPengumuman::class)->name('pengumuman.input-pengumuman');
        Route::get('pengumuman/hasil-diterima', HasilPengumumanTerima::class)->name('pengumuman.hasil-diterima');
        Route::get('pengumuman/hasil-ditolak', HasilPengumumanTolak::class)->name('pengumuman.hasil-ditolak');
    });

    // route for wawancara
    Route::middleware(['role:Ukur Seragam'])->group(function () {

        Route::get('ukur-seragam/ukur-seragam', UkurSeragam::class)->name('ukur-seragam.ukur-seragam');
        Route::get('ukur-seragam/sudah-ukur', SudahUkur::class)->name('ukur-seragam.sudah-ukur');
        Route::get('ukur-seragam/belum-ukur', BelumUkur::class)->name('ukur-seragam.belum-ukur');
    });

    // route for wawancara
    Route::middleware(['role:Wawancara'])->group(function () {

        Route::get('wawancara/input-wawancara', InputWawancara::class)->name('wawancara.input-wawancara');
        Route::get('wawancara/hasil-diterima', HasilWawancaraTerima::class)->name('wawancara.hasil-diterima');
        Route::get('wawancara/hasil-ditolak', HasilWawancaraTolak::class)->name('wawancara.hasil-ditolak');
    });



    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
