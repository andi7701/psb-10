<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\PrintRekapUkuranController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\AturTes;
use App\Http\Livewire\BelumDaftarUlang;
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
use App\Http\Livewire\HasilTesGlobal;
use App\Http\Livewire\HasilWawancaraTerima;
use App\Http\Livewire\HasilWawancaraTolak;
use App\Http\Livewire\Home;
use App\Http\Livewire\InputAgama;
use App\Http\Livewire\InputKesehatan;
use App\Http\Livewire\InputMinatBakat;
use App\Http\Livewire\InputPembayaran;
use App\Http\Livewire\InputPengumuman;
use App\Http\Livewire\InputTarget;
use App\Http\Livewire\InputWawancara;
use App\Http\Livewire\Landing;
use App\Http\Livewire\Pendaftaran;
use App\Http\Livewire\PrintRekapUkuran;
use App\Http\Livewire\RekapHasilAkademik;
use App\Http\Livewire\Rekapitulasi;
use App\Http\Livewire\RekapitulasiKamar;
use App\Http\Livewire\RekapKecamatan;
use App\Http\Livewire\RekapKecamatanPublic;
use App\Http\Livewire\RekapPerSeleksi;
use App\Http\Livewire\RekapTes;
use App\Http\Livewire\RekapUkuran;
use App\Http\Livewire\ResetTes;
use App\Http\Livewire\SudahDaftarUlang;
use App\Http\Livewire\SudahUkur;
use App\Http\Livewire\UbahHasil;
use App\Http\Livewire\UbahHasilAkademik;
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

Route::get('rekap-kecamatan', RekapKecamatanPublic::class)->name('rekap-kecamatan');

// Authenticated User
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Exam
    Route::get('/exam', Exam::class)->name('exam');

    // API
    Route::get('/users-kode-daftar', [ApiController::class, 'usersKodeDaftar'])->name('users-kode-daftar');
    Route::get('/users-diterima', [ApiController::class, 'usersDiterima'])->name('users-diterima');

    Route::get('rekapitulasi-kamar', RekapitulasiKamar::class)->name('rekapitulasi-kamar');

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
        Route::get('akademik/rekap-test', RekapTes::class)->name('akademik.rekap-test');
        Route::get('akademik/reset-test', ResetTes::class)->name('akademik.reset-test');

        Route::get('akademik/ubah-hasil-akademik', UbahHasilAkademik::class)->name('akademik.ubah-hasil-akademik');
    });

    // route for Bendahara
    Route::middleware(['role:Bendahara'])->group(function () {

        Route::get('bendahara/input-pembayaran', InputPembayaran::class)->name('bendahara.input-pembayaran');
        Route::get('bendahara/sudah-daftar-ulang', SudahDaftarUlang::class)->name('bendahara.sudah-daftar-ulang');
        Route::get('bendahara/belum-daftar-ulang', BelumDaftarUlang::class)->name('bendahara.belum-daftar-ulang');


        // Print
        Route::get('bendahara/print/kwitansi/{user}', [PrintController::class, 'kwitansi'])->name('bendahara.print-kwitansi');
    });


    // route for Kepala Sekolah
    Route::middleware(['role:Kepala Sekolah'])->group(function () {

        Route::get('kepala-sekolah/data-pendaftar', DataPendaftar::class)->name('kepala-sekolah.data-pendaftar');
        Route::get('kepala-sekolah/detail-pendaftar/{user}', DetailPendaftar::class)->name('kepala-sekolah.detail-pendaftar');

        // Tes Seleksi
        Route::get('kepala-sekolah/hasil-agama', HasilAgamaTerima::class)->name('kepala-sekolah.hasil-agama');
        Route::get('kepala-sekolah/hasil-akademik', HasilAkademikTerima::class)->name('kepala-sekolah.hasil-akademik');
        Route::get('kepala-sekolah/hasil-kesehatan', HasilKesehatanTerima::class)->name('kepala-sekolah.hasil-kesehatan');
        Route::get('kepala-sekolah/hasil-minat-bakat', HasilMinatTerima::class)->name('kepala-sekolah.hasil-minat-bakat');
        Route::get('kepala-sekolah/hasil-pengumuman', HasilPengumumanTerima::class)->name('kepala-sekolah.hasil-pengumuman');
        Route::get('kepala-sekolah/hasil-wawancara', HasilWawancaraTerima::class)->name('kepala-sekolah.hasil-wawancara');

        //Hasil Tes Akademik
        Route::get('kepala-sekolah/hasil-test-akademik', HasilTes::class)->name('kepala-sekolah.hasil-test-akademik');


        // Rekap
        Route::get('kepala-sekolah/rekapitulasi', Rekapitulasi::class)->name('kepala-sekolah.rekapitulasi');
        Route::get('kepala-sekolah/rekap-hasil-akademik', RekapHasilAkademik::class)->name('kepala-sekolah.rekap-hasil-akademik');
        Route::get('kepala-sekolah/rekap-kecamatan', RekapKecamatan::class)->name('kepala-sekolah.rekap-kecamatan');
        Route::get('kepala-sekolah/hasil-test-global', HasilTesGlobal::class)->name('kepala-sekolah.hasil-test-global');
    });

    // route for kesehatan
    Route::middleware(['role:Kesehatan'])->group(function () {

        Route::get('kesehatan/input-kesehatan', InputKesehatan::class)->name('kesehatan.input-kesehatan');
        Route::get('kesehatan/hasil-diterima', HasilKesehatanTerima::class)->name('kesehatan.hasil-diterima');
        Route::get('kesehatan/hasil-ditolak', HasilKesehatanTolak::class)->name('kesehatan.hasil-ditolak');
    });

    // route for Ketua
    Route::middleware(['role:Ketua'])->group(function () {

        Route::get('ketua/data-pendaftar', DataPendaftar::class)->name('ketua.data-pendaftar');
        Route::get('ketua/detail-pendaftar/{user}', DetailPendaftar::class)->name('ketua.detail-pendaftar');
        Route::get('ketua/pendaftaran', Pendaftaran::class)->name('ketua.pendaftaran');

        //input target
        Route::get('ketua/input-target', InputTarget::class)->name('ketua.input-target');

        // Tes Seleksi
        Route::get('ketua/input-agama', InputAgama::class)->name('ketua.input-agama');
        Route::get('ketua/input-kesehatan', InputKesehatan::class)->name('ketua.input-kesehatan');
        Route::get('ketua/input-minat-bakat', InputMinatBakat::class)->name('ketua.input-minat-bakat');
        Route::get('ketua/input-pengumuman', InputPengumuman::class)->name('ketua.input-pengumuman');
        Route::get('ketua/input-wawancara', InputWawancara::class)->name('ketua.input-wawancara');

        //Atur Tes Akademik
        Route::get('ketua/atur-test', AturTes::class)->name('ketua.atur-test');
        Route::get('ketua/hasil-test-akademik', HasilTes::class)->name('ketua.hasil-test-akademik');

        // Hasil Semua Test
        Route::get('ketua/agama/hasil-diterima', HasilAgamaTerima::class)->name('ketua.agama.hasil-diterima');
        Route::get('ketua/agama/hasil-ditolak', HasilAgamaTolak::class)->name('ketua.agama.hasil-ditolak');
        Route::get('ketua/akademik/hasil-diterima', HasilAkademikTerima::class)->name('ketua.akademik.hasil-diterima');
        Route::get('ketua/akademik/hasil-ditolak', HasilAkademikTolak::class)->name('ketua.akademik.hasil-ditolak');
        Route::get('ketua/kesehatan/hasil-diterima', HasilKesehatanTerima::class)->name('ketua.kesehatan.hasil-diterima');
        Route::get('ketua/kesehatan/hasil-ditolak', HasilKesehatanTolak::class)->name('ketua.kesehatan.hasil-ditolak');
        Route::get('ketua/minat-bakat/hasil-diterima', HasilMinatTerima::class)->name('ketua.minat-bakat.hasil-diterima');
        Route::get('ketua/minat-bakat/hasil-ditolak', HasilMinatTolak::class)->name('ketua.minat-bakat.hasil-ditolak');
        Route::get('ketua/wawancara/hasil-diterima', HasilWawancaraTerima::class)->name('ketua.wawancara.hasil-diterima');
        Route::get('ketua/wawancara/hasil-ditolak', HasilWawancaraTolak::class)->name('ketua.wawancara.hasil-ditolak');

        // Rekap
        Route::get('ketua/rekapitulasi', Rekapitulasi::class)->name('ketua.rekapitulasi');
        Route::get('ketua/rekap-hasil-akademik', RekapHasilAkademik::class)->name('ketua.rekap-hasil-akademik');
        Route::get('ketua/rekap-kecamatan', RekapKecamatan::class)->name('ketua.rekap-kecamatan');
        Route::get('ketua/rekap-per-seleksi', RekapPerSeleksi::class)->name('ketua.rekap-per-seleksi');
        Route::get('ketua/hasil-test-global', HasilTesGlobal::class)->name('ketua.hasil-test-global');
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

        //Print
        Route::get('pendaftaran/print/formulir-pendaftaran/{user}', [PrintController::class, 'formulir_pendaftaran'])->name('pendaftaran.print-formulir-pendaftaran');
        Route::get('pendaftaran/print/kartu-pendaftaran/{user}', [PrintController::class, 'kartu_pendaftaran'])->name('pendaftaran.print-kartu-pendaftaran');
    });

    // route for pengumuman
    Route::middleware(['role:Pengumuman'])->group(function () {

        Route::get('pengumuman/input-pengumuman', InputPengumuman::class)->name('pengumuman.input-pengumuman');
        Route::get('pengumuman/hasil-diterima', HasilPengumumanTerima::class)->name('pengumuman.hasil-diterima');
        Route::get('pengumuman/hasil-ditolak', HasilPengumumanTolak::class)->name('pengumuman.hasil-ditolak');

        // Print
        Route::get('pengumuman/print/pengumuman/{user}', [PrintController::class, 'pengumuman'])->name('pengumuman.print-pengumuman');
        Route::get('pengumuman/print/surat-santri/{user}', [PrintController::class, 'surat_santri'])->name('pengumuman.print-surat-santri');
        Route::get('pengumuman/print/surat-orang-tua/{user}', [PrintController::class, 'surat_orang_tua'])->name('pengumuman.print-surat-orang-tua');
    });


    // route for Sekretaris
    Route::middleware(['role:Sekretaris'])->group(function () {

        Route::get('sekretaris/data-pendaftar', DataPendaftar::class)->name('sekretaris.data-pendaftar');
        Route::get('sekretaris/detail-pendaftar/{user}', DetailPendaftar::class)->name('sekretaris.detail-pendaftar');
        Route::get('sekretaris/pendaftaran', Pendaftaran::class)->name('sekretaris.pendaftaran');


        // Tes Seleksi
        Route::get('sekretaris/input-agama', InputAgama::class)->name('sekretaris.input-agama');
        Route::get('sekretaris/input-kesehatan', InputKesehatan::class)->name('sekretaris.input-kesehatan');
        Route::get('sekretaris/input-minat-bakat', InputMinatBakat::class)->name('sekretaris.input-minat-bakat');
        Route::get('sekretaris/input-pengumuman', InputPengumuman::class)->name('sekretaris.input-pengumuman');
        Route::get('sekretaris/input-wawancara', InputWawancara::class)->name('sekretaris.input-wawancara');

        //Atur Tes Akademik
        Route::get('sekretaris/atur-test', AturTes::class)->name('sekretaris.atur-test');
        Route::get('sekretaris/hasil-test-akademik', HasilTes::class)->name('sekretaris.hasil-test-akademik');
        Route::get('sekretaris/hasil-test-global', HasilTesGlobal::class)->name('sekretaris.hasil-test-global');
    });

    // route for Ukur Seragam
    Route::middleware(['role:Ukur Seragam'])->group(function () {

        Route::get('ukur-seragam/ukur-seragam', UkurSeragam::class)->name('ukur-seragam.ukur-seragam');
        Route::get('ukur-seragam/belum-ukur', BelumUkur::class)->name('ukur-seragam.belum-ukur');
        Route::get('ukur-seragam/sudah-ukur', SudahUkur::class)->name('ukur-seragam.sudah-ukur');
        Route::get('ukur-seragam/rekap-ukuran', RekapUkuran::class)->name('ukur-seragam.rekap-ukuran');
        Route::get('ukur-seragam/print-rekap-ukuran', [PrintRekapUkuranController::class, 'index'])->name('ukur-seragam.print-rekap-ukuran');
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
