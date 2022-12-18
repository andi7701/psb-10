<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\DataPendaftar;
use App\Http\Livewire\Home;
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

Route::get('/', function () {
    return view('welcome');
})->name('landing');
Route::get('/home', Home::class)->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:Admin'])->group(function () {
        
        Route::get('/data-pendaftar', DataPendaftar::class)->name('data-pendaftar');
        Route::get('/pendaftaran', Pendaftaran::class)->name('pendaftaran');
    });


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
